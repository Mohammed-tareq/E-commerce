@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.coupons') }}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.coupons') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.coupons') }}</a>
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
                        <h4 class="card-title">{{ __('dashboard.coupons') }}</h4>
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
                                    data-target="#createCouponModal" id="create-coupon">
                                {{ __('dashboard.create_coupon') }}
                            </button>
                            {{--  crate and edit model  --}}
                            @include('dashboard.coupons.create')
                            @include('dashboard.coupons.edit')


                        </div>

                        <div class="card-body card-dashboard">
                            <p class="card-text">{{ __('dashboard.yajra_table') }}</p>
                            <table id="yajra_table" class="table table-striped table-bordered dom-jQuery-events">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.code') }}</th>
                                    <th>{{ __('dashboard.discount_percentage') }}</th>
                                    <th>{{ __('dashboard.start_date') }}</th>
                                    <th> {{ __('dashboard.end_date') }}</th>
                                    <th>{{ __('dashboard.limiter') }}</th>
                                    <th>{{ __('dashboard.used') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
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
                                    <th>{{ __('dashboard.code') }}</th>
                                    <th>{{ __('dashboard.discount_percentage') }}</th>
                                    <th>{{ __('dashboard.start_date') }}</th>
                                    <th> {{ __('dashboard.end_date') }}</th>
                                    <th>{{ __('dashboard.limiter') }}</th>
                                    <th>{{ __('dashboard.used') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
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
    @include('incloudes.sweet-delete')

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
                            return 'Details for ' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },

            ajax: "{{ route('dashboard.coupons.all') }}",
            columns: [
                {data: "DT_RowIndex", "orderable": false, "searchable": false},
                {data: "code"},
                {data: "discount_percentage"},
                {data: "start_date"},
                {data: "end_date"},
                {data: "limiter"},
                {data: "used"},
                {data: "status"},
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

            let id = $(this).data('id');
            let url = " {{ route('dashboard.coupon.status', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                'url': url,
                'type': 'GET',
                'success': function (data) {
                    $('#yajra_table').DataTable().ajax.reload();
                    $('#tostar-success').show();
                    $('#tostar-success').text(data.message);
                    setTimeout(function () {
                        $('#tostar-success').hide();
                    }, 5000);
                },

                'error': function (data) {
                    $('#tostar-error').show();
                    $('#tostar-error').text(data.responseJSON.message);
                    setTimeout(function () {
                        $('#tostar-error').hide();
                    }, 5000);
                }

            })
        })
    </script>

    {{-- clear create model form error and create coupon        --}}
    <script>
        $(document).on('click', '#create-coupon', function (e) {
            e.preventDefault();
            $('#error-list').empty();
            $('#error-block').hide();
        });


        $('#create-coupon-form').on('submit', function (e) {
            e.preventDefault();
            alert('test');
            let url = "{{ route('dashboard.coupons.store') }}";
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
                        $('#yajra_table').DataTable().ajax.reload();
                        $('#create-coupon-form')[0].reset();
                        $('#createCouponModal').modal('hide');
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
                        $('#createCouponModal').modal('show');

                    });
                },

            });
        })
    </script>


    <script>

        $(document).on('click', '.edit-coupon', function (e) {
            e.preventDefault();


            $('#coupon-code').val($(this).data('coupon-code'));
            $('#discount-percentage').val($(this).data('discount'));
            $('#start-date').val($(this).data('start_date'));
            $('#end-date').val($(this).data('end_date'));
            $('#limit-used').val($(this).data('limiter'));
            let status = $(this).data('status');
            if (status == 1) {
                $('#status-active').prop('checked', true);
            } else {
                $('#status-inactive').prop('checked', true);
            }
            $('#error-list').empty();
            $('#error-block').hide();
            $('#editCouponModal').modal('show');
        })

        // update coupon form

        $(document).on('submit', '#update-coupon-form', function (e) {
            e.preventDefault();

            let id = $('.edit-coupon').data('id');
            let url = "{{ route('dashboard.coupons.update', ':id') }}";
            url = url.replace(':id', id);

            let formData = new FormData(this);
            formData.append('_method', 'PUT');
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
                        $('#update-coupon-form')[0].reset();
                        $('#editCouponModal').modal('hide');
                        $('#yajra_table').DataTable().ajax.reload();
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
                        $('#editCouponModal').modal('show');
                    });
                },

            });
        })

    </script>

@endpush
