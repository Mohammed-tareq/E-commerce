@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.attributes') }}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.attributes') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.attributes') }}</a>
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
                        <h4 class="card-title">{{ __('dashboard.attributes') }}</h4>
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
                                    data-target="#createAttributeModal" id="create-attribute">
                                {{ __('dashboard.create_attribute') }}
                            </button>
                            {{--  crate and edit model  --}}
                            @include('dashboard.attribute.create')
                            @include('dashboard.attribute.edit')


                        </div>

                        <div class="card-body card-dashboard">
                            <p class="card-text">{{ __('dashboard.yajra_table') }}</p>
                            <table id="yajra_table" class="table table-striped table-bordered dom-jQuery-events">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.attribute_name') }}</th>
                                    <th>{{ __('dashboard.attribute_value') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- body  --}}

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.attribute_name') }}</th>
                                    <th>{{ __('dashboard.attribute_value') }}</th>
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
                            return 'Details for ' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },

            ajax: "{{ route('dashboard.attributes.all') }}",
            columns: [
                {data: "DT_RowIndex", "orderable": false, "searchable": false},
                {data: "name", "width": "20%"},
                {data: "attribute_values"},
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
        $(document).ready(function () {

            let indexNum = 1;
            //add value for attribute
            $('#add-value').on('click', function () {


                let newValues = ` <div class=" row add-row-value">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="attribute_value_ar">{{ __('dashboard.attribute_value_ar') }}</label>
                                <input type="text" class="form-control" id="attribute_value_ar"
                                       placeholder="{{ __('placeHolder.attribute_value_ar') }}"
                                       name="attribute_value[${indexNum}][ar]">
                                <span class="text-danger error-message" id="error_attribute_value_${indexNum}_ar"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="attribute_value_en">{{ __('dashboard.attribute_value_en') }}</label>
                                <input type="text" class="form-control" id="attribute_value_en"
                                       placeholder="{{ __('placeHolder.attribute_value_en') }}"
                                       name="attribute_value[${indexNum}][en]">
                                <span class="text-danger error-message" id="error_attribute_value_${indexNum}_en"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger remove mt-2"
                                        id="delete-value">
                                    <i class="la la-trash"></i>
                                </button>
                            </div>
                        </div>

                    </div>`;

                $('.add-row-value:last').after(newValues);
                indexNum++;
            });
        });

        //delete value for attribute
        $(document).on('click', '.remove', function () {
            $(this).closest('.add-row-value').remove();
        });
    </script>


    {{-- clear create model form error and create attribute        --}}
    <script>
        $(document).on('click', '#create-attribute', function (e) {
            e.preventDefault();
            $('.error-message').empty();
        });


        $('#create-attribute-form').on('submit', function (e) {
            e.preventDefault();

            let url = "{{ route('dashboard.attributes.store') }}"
            let data = new FormData(this);

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,

                success: function (data) {
                    if (data.status === true) {
                        $('.error-message').empty();
                        $('#createAttributeModal').modal('hide');
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

                error: function (data) {
                    $.each(data.responseJSON.errors, function (key, value) {
                        let sanitizedKey = key.replace(/\./g, '_');
                        $('#error_' + sanitizedKey).text(value[0]);
                    })
                }
            });
        });
    </script>


    {{--    clear edit model form error and edit --}}
    <script>
        $(document).on('click', '.edit-attribute', function (e) {
            e.preventDefault();
            $('.error-message').empty();
            $('#editAttributeModal').modal('show');
            $('#edit-values-container').html('');

            var attrId = $(this).data('id');
            let attrNameAr = $(this).data('name-ar');
            let attrNameEn = $(this).data('name-en');

            $('#update-attribute-form').attr('attribute-id', attrId);
            $('#edit_attribute_name_ar').val(attrNameAr);
            $('#edit_attribute_name_en').val(attrNameEn);
            let values = $(this).data('values');

            values.forEach(value => {
                $('#edit-values-container').append(`<div class=" row edit-row-value">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="edit_attribute_value_ar">{{ __('dashboard.attribute_value_ar') }}</label>
                                <input type="text" class="form-control" id="edit_attribute_value_${value.id}_ar"
                                       placeholder="{{ __('placeHolder.attribute_value_ar') }}"
                                       name="attribute_value[${value.id}][ar]"
                                       value="${value.valueAr}">
                                <span class="text-danger error-message" id="error_edit_attribute_value_${value.id}_ar"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="edit_attribute_value_en">{{ __('dashboard.attribute_value_en') }}</label>
                                <input type="text" class="form-control" id="edit_attribute_value_${value.id}_en"
                                       placeholder="{{ __('placeHolder.attribute_value_en') }}"
                                       name="attribute_value[${value.id}][en]"
                                                value="${value.valueEn}">
                                <span class="text-danger error-message" id="error_edit_attribute_value_${value.id}_en"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger remove-edit mt-2"
                                        id="delete-value">
                                    <i class="la la-trash"></i>
                                </button>
                            </div>
                        </div>

                    </div>`);
            });


        });


        let editIndexNum = $('#edit-values-container .edit-row-value').length + 1;
        $('#add-value-edit').on('click', function () {


            let newValuesEdit = ` <div class=" row edit-row-value">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="edit_attribute_value_ar">{{ __('dashboard.attribute_value_ar') }}</label>
                                <input type="text" class="form-control" id="edit_attribute_value_${editIndexNum}_ar"
                                       placeholder="{{ __('placeHolder.attribute_value_ar') }}"
                                       name="attribute_value[${editIndexNum}][ar]">
                                <span class="text-danger error-message" id="error_edit_attribute_value_${editIndexNum}_ar"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="edit_attribute_value_en">{{ __('dashboard.attribute_value_en') }}</label>
                                <input type="text" class="form-control" id="edit_attribute_value_${editIndexNum}_en"
                                       placeholder="{{ __('placeHolder.attribute_value_en') }}"
                                       name="attribute_value[${editIndexNum}][en]">
                                <span class="text-danger error-message" id="error_edit_attribute_value_${editIndexNum}_en"></span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger remove-edit mt-2"
                                        id="delete-value">
                                    <i class="la la-trash"></i>
                                </button>
                            </div>
                        </div>

                    </div>`;

            $('#edit-values-container').append(newValuesEdit);
            editIndexNum++;
        });

        $(document).on('click', '.remove-edit', function () {
            $(this).closest('.edit-row-value').remove();
        });

        $('#update-attribute-form').on('submit', function (e) {
            e.preventDefault();

            let attrId = $(this).attr('attribute-id');
            console.log(attrId);
            let url = "{{ route('dashboard.attributes.update', ':id') }}".replace(':id', attrId);
            let data = new FormData(this);
            data.append('_method', 'PUT');

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,

                success: function (data) {
                    if (data.status === true) {
                        $('.error-message').empty();
                        $('#editAttributeModal').modal('hide');
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
                error: function (error) {
                    $.each(error.responseJSON.errors, function (key, value) {
                        let sanitizedKey = key.replace(/\./g, '_');
                        $('#error_edit_' + sanitizedKey).text(value[0]);
                    });
                },
            });
        });
    </script>


    {{--    delete attribute--}}
    <script>
        $(document).on('click','.attribute-delete' , function (e){
            e.preventDefault();
            let id = $(this).data('id');
            let url = "{{ route('dashboard.attributes.destroy', ':id') }}"
           url =  url.replace(':id' , id);
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
                        },
                        error:function (data){
                            console.log(data.responsJSON.message);
                        }
                    });
                }
            });
        });
    </script>
@endpush
