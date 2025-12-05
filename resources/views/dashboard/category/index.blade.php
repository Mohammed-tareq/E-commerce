@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.categories') }}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.categories') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.categories') }}</a>
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
                        <h4 class="card-title">{{ __('dashboard.categories') }}</h4>
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
                        <div class="card-body card-dashboard">
                            <p class="card-text">{{ __('dashboard.yajra_table') }}</p>
                            <table id="yajra_table" class="table table-striped table-bordered dom-jQuery-events">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
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
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.status') }}</th>
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

            ajax: "{{ route('dashboard.categories.all') }}",
            columns: [
                {data: "DT_RowIndex", "orderable": false, "searchable": false},
                {data: "name"},
                {data: "status"},
                {data: "created_at"},
                {data: "action", "orderable": false, "searchable": false, "width": "10%", 'selectable': false,},
            ],

            layout: {
                topStart: {
                    pageLength: true,
                    buttons:
                        [
                            'copy', 'excel', 'pdf', 'csv', 'print', 'colvis'
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
