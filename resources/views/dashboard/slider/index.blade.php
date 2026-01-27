@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.slider') }}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.slider') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.slider') }}</a>
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
                        <h4 class="card-title">{{ __('dashboard.slider') }}</h4>
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

                    <div class="card-content collapse show">
                        <div class="d-flex justify-content-start mx-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createSliderModal" id="create-slider">
                                {{ __('dashboard.create_slider') }}
                            </button>
                            {{--  crate and edit model  --}}
                            @include('dashboard.slider.create')


                        </div>

                        <div class="card-body card-dashboard">
                            <p class="card-text">{{ __('dashboard.yajra_table') }}</p>
                            <table id="yajra_table" class="table table-striped table-bordered dom-jQuery-events">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.image') }}</th>
                                    <th>{{ __('dashboard.note') }}</th>
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
                                    <th>{{ __('dashboard.image') }}</th>
                                    <th>{{ __('dashboard.note') }}</th>
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
        $(document).ready(function () {
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
                                return 'Details for ' + data['note'];
                            }
                        }),
                        renderer: DataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                },

                ajax: "{{ route('dashboard.slider.all') }}",
                columns: [
                    {data: "DT_RowIndex", "orderable": false, "searchable": false},
                    {data: "image"},
                    {data: "note"},
                    {data: "created_at"},
                    {data: "actions", "orderable": false, "searchable": false, "width": "10%", 'selectable': false,},
                ],

                layout: {
                    topStart: {
                        pageLength: true,
                        buttons:
                            [
                                'colvis'
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

            // file input links and functions
            @include('incloudes.file-input.links')

            $("#slider-image").fileinput({
                theme: "fa5",
                language: lang,
                showUpload: false,
                showCancel: false,
                showClose: true,
                maxFileCount: 1,
                allowedFileTypes: ['image'],
            });

        });

    </script>


    {{-- clear create model form error and create sliderh  --}}
    <script>
        $(document).on('click', '#create-slider', function (e) {
            e.preventDefault();
            $('#error-list').empty();
            $('#error-block').hide();
        });


        $('#create-slider-form').on('submit', function (e) {
            e.preventDefault();

            let url = "{{ route('dashboard.slider.store') }}";
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
                        $('#create-slider-form')[0].reset();
                        $('#createSliderModal').modal('hide');
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
                    $.each(data.responseJSON.errors, function (key, value) {
                        $('#error-list').append('<li>' + value[0] + '</li>');
                        $('#error-block').show();
                        $('#createSliderModal').modal('show');

                    });
                },

            });
        })
    </script>




    <script>

        // delete slider
        $(document).on('click', '.delete-slider', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let url = "{{ route('dashboard.slider.delete', ':id') }}".replace(':id', id);

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

