@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.products') }}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.products') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.products') }}</a>
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
                        <h4 class="card-title">{{ __('dashboard.products') }}</h4>
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
                        <div class="card-body card-dashboard">
                            <p class="card-text">{{ __('dashboard.yajra_table') }}</p>
                            <table id="yajra_table" class="table table-striped table-bordered dom-jQuery-events">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.image') }}</th>
                                    <th>{{ __('dashboard.has_variants') }}</th>
                                    <th>{{ __('dashboard.sku') }}</th>
                                    <th>{{ __('dashboard.available_for') }}</th>
                                    <th> {{ __('dashboard.status') }}</th>
                                    <th> {{ __('dashboard.brand') }}</th>
                                    <th> {{ __('dashboard.category') }}</th>
                                    <th> {{ __('dashboard.price') }}</th>
                                    <th> {{ __('dashboard.qty') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- body  --}}

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.image') }}</th>
                                    <th>{{ __('dashboard.has_variants') }}</th>
                                    <th>{{ __('dashboard.sku') }}</th>
                                    <th>{{ __('dashboard.available_for') }}</th>
                                    <th> {{ __('dashboard.status') }}</th>
                                    <th> {{ __('dashboard.brand') }}</th>
                                    <th> {{ __('dashboard.category') }}</th>
                                    <th> {{ __('dashboard.price') }}</th>
                                    <th> {{ __('dashboard.qty') }}</th>
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
                selector: 'td:not(:last-child):not(:first-child):not(:nth-child(3))',
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


            ajax: "{{ route('dashboard.products.all') }}",
            columns: [
                {data: "DT_RowIndex", "orderable": false, "searchable": false},
                {data: "name"},
                {data: "images" , "orderable": false, "searchable": false,},
                {data: "has_variants"},
                {data: "sku"},
                {data: "available_for"},
                {data: "status"},
                {data: "brand"},
                {data: "category"},
                {data: "price"},
                {data: "qty"},
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

    <script>
        $(document).on('click', '.change-status', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let url = "{{ route('dashboard.product.status',':id') }}"
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    if (data.status === true) {
                        $('#yajra_table').DataTable().ajax.reload(false);
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
            });
        });

        // delete coupon
        $(document).on('click', '.delete-product', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let url = "{{ route('dashboard.products.destroy', ':id') }}".replace(':id', id);

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

                            Swal.fire({
                                position: "center",
                                icon: data.status ? "success" : 'error',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('#yajra_table').DataTable().page(currentPage).draw(false);
                        }
                    });
                }
            });
        });
    </script>

@endpush



