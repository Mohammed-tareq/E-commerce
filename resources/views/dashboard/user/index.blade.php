@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.users') }}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.users') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.users') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Hoverable rows start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('dashboard.users') }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @include('incloudes.tostar.tostar-success')
                    @include('incloudes.tostar.tostar-error')
                    <div class="card-content collapse show">
                        <div class="d-flex justify-content-start mx-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createUserModal" id="create-user">
                                {{ __('dashboard.create_user') }}
                            </button>
                            {{--  crate and edit model  --}}
                            @include('dashboard.user.create')

                        </div>

                        <div class="card-body card-dashboard">
                            <p class="card-text">{{ __('dashboard.yajra_table') }}</p>
                            <table id="yajra_table" class="table table-striped table-bordered dom-jQuery-events">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.first_name') }}</th>
                                    <th>{{ __('dashboard.last_name') }}</th>
                                    <th>{{ __('dashboard.email') }}</th>
                                    <th>{{ __('dashboard.phone') }}</th>
                                    <th> {{ __('dashboard.image') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
                                    <th>{{ __('dashboard.country') }}</th>
                                    <th>{{ __('dashboard.governorate') }}</th>
                                    <th>{{ __('dashboard.city') }}</th>
                                    <th>{{ __('dashboard.created') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- body  --}}

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.first_name') }}</th>
                                    <th>{{ __('dashboard.last_name') }}</th>
                                    <th>{{ __('dashboard.email') }}</th>
                                    <th>{{ __('dashboard.phone') }}</th>
                                    <th> {{ __('dashboard.image') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
                                    <th>{{ __('dashboard.country') }}</th>
                                    <th>{{ __('dashboard.governorate') }}</th>
                                    <th>{{ __('dashboard.city') }}</th>
                                    <th>{{ __('dashboard.created') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hoverable rows end -->
    </div>
@endsection



@push('css')
    @include('layouts.dashboard.includes.data-table.css')

@endpush
@push('js')

    {{-- data table   --}}
    @include('layouts.dashboard.includes.data-table.js')

    <script>
        let lang = '{{ app()->getLocale() }}';
        $('#yajra_table').DataTable({
            processing: true,
            serverSide: true,
            colReorder: true,
            fixedColumns: true,
            fixedHeader: true,
            select: {
                style: 'multi',
                selector: 'td:not(:last-child)',
                className: 'selected'
            },
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details for ' + data['name'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },

            ajax: "{{ route('dashboard.user.all') }}",
            columns: [
                {data: "DT_RowIndex", "orderable": false, "searchable": false},
                {data: "first_name"},
                {data: "last_name"},
                {data: "email"},
                {data: "phone"},
                {data: "image"},
                {data: "status"},
                {data: "country"},
                {data: "governorate"},
                {data: "city"},
                {data: "created_at"},
                {data: "action", "orderable": false, "searchable": false, "width": "10%", 'selectable': false,},
            ],

            layout: {
                topStart: {
                    pageLength: true,
                    buttons:
                        [
                            'copy', 'excel', 'pdf', 'csv',
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            }, 'colvis'
                        ]
                }
            },
            language: lang === 'ar' ? {
                url: '//cdn.datatables.net/plug-ins/2.3.5/i18n/ar.json',
                paginate: {
                    next: "التالي",
                    previous: "السابق"
                }
            } : {},
        });


    </script>


    {{-- change status --}}
    <script>

        $(document).on('click', '.change-status', function (e) {
            e.preventDefault();
            let id = $(this).data("id");
            let url = "{{ route('dashboard.user.status', ':id') }}"
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    if (data.status) {
                        $('#yajra_table').DataTable().ajax.reload(false);
                        $('#tostar-success').show();
                        $('#tostar-success').text(data.message);
                        setTimeout(function () {
                            $('#tostar-success').hide();
                        }, 5000);
                    } else {
                        $('#tostar-error').show();
                        $('#tostar-error').text(data.message);
                        setTimeout(function () {
                            $('#tostar-error').hide();
                        }, 5000);
                    }
                },

            })
        })
    </script>

    <script>
        $(document).on('click', '#create-user', function (e) {
            e.preventDefault();
            $('#error-list').empty();
            $('#error-block').hide();
        });


        $('#create-user-form').on('submit', function (e) {
            e.preventDefault();

            let url = "{{ route('dashboard.user.create') }}";
            let formData = new FormData(this);
            $('#error-list').empty();
            $('#error-block').hide();

            $.ajax({
                'url': url,
                'type': 'POST',
                'data': formData,
                'processData': false,
                'contentType': false,

                'success': function (data) {
                    if (data.status === true) {
                        $('#yajra_table').DataTable().ajax.reload(false);
                        $('#create-user-form')[0].reset();
                        $('#createUserModal').modal('hide');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });

                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                'error': function (data) {
                    $('#error-list').empty();
                    $.each(data.responseJSON.errors, function (key, value) {
                        $('#error-list').append('<li>' + value[0] + '</li>');
                    });
                    $('#error-block').show();
                    $('#createUserModal').modal('show');
                },
            });

        })
    </script>

    <script>

        // delete coupon
        $(document).on('click', '.delete-user', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let url = "{{ route('dashboard.user.delete',':id') }}";

            url = url.replace(':id' , id);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: true
            });

            swalWithBootstrapButtons.fire({
                title: "{{ __('dashboard.delete_alert') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{ __('dashboard.delete') }}",
                cancelButtonText: "{{ __('dashboard.cancel') }}",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'DELETE'
                        },
                        success: function (data) {
                            if (data.status === true) {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                $('#yajra_table').DataTable().ajax.reload(false);
                            } else {
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                        }
                    });
                }
            });
        });


    </script>

@endpush
