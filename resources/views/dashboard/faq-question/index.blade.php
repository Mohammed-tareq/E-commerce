@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.faq_question') }}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.faq_question') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.faq_question') }}</a>
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
                        <h4 class="card-title">{{ __('dashboard.faq_question') }}</h4>
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
                        <div class="card-body card-dashboard ">

                            <p class="card-text">{{ __('dashboard.yajra_table') }}</p>
                            <table id="yajra_table" class="table table-striped table-bordered dom-jQuery-events">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.email') }}</th>
                                    <th>{{ __('dashboard.subject') }}</th>
                                    <th>{{ __('dashboard.message') }}</th>
                                    <th> {{ __('dashboard.created') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- body  --}}

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>#</th>
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.email') }}</th>
                                    <th>{{ __('dashboard.subject') }}</th>
                                    <th>{{ __('dashboard.message') }}</th>
                                    <th> {{ __('dashboard.created') }}</th>
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

            ajax: "{{ route('dashboard.page.all') }}",
            columns: [
                {data: "DT_RowIndex", "orderable": false, "searchable": false},
                {data: "name"},
                {data: "email"},
                {data: "subject"},
                {data: "message"},
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


    </script>

@endpush


@push('js')
    <script>
        $(document).on('click' , '.delete_faq' , function(e){
            e.preventDefault();

            let id = $(this).data('id');
            let url = " {{ route('dashboard.faq-question.delete', ':id') }}";
            url = url.replace(':id', id);

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
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}",
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

    </>
@endpush
