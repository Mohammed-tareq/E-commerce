@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.faqs') }}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.faqs') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.faqs') }}</a>
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
                        <h4 class="card-title">{{ __('dashboard.faqs') }}</h4>
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
                                    data-target="#createFaqModal" id="create-faq">
                                {{ __('dashboard.create_faq') }}
                            </button>
                            {{--  crate and edit model  --}}
                            @include('dashboard.faq.create')
                            @include('dashboard.faq.edit')
                        </div>


                        <div class="card-body card-dashboard">
                            <div class="col-md-12">
                                <div class="card" id="headingCollapse51">
                                    <div role="tabpanel" class="card-header border-success">
                                        <a data-toggle="collapse" href="#collapse51" aria-expanded="true"
                                           aria-controls="collapse51"
                                           class="font-medium-1 primary">Collapsible Group Item #1</a>
                                        <a  href="javascript:void(0)" class=" float-right delete-faq" data-id="1">
                                            <i class="danger la la-trash"></i>
                                        </a>
                                        <a href="javascript:void(0)"  class="float-right mx-2" data-id="1">
                                            <i class="primary la la-edit"></i>
                                        </a>
                                    </div>
                                    <div id="collapse51" role="tabpanel" aria-labelledby="headingCollapse51"
                                         class="card-collapse collapse show"
                                         aria-expanded="true">
                                        <div class="card-body">
                                            Caramels dessert chocolate cake pastry jujubes bonbon. Jelly wafer jelly
                                            beans. Caramels
                                            chocolate cake liquorice cake wafer jelly beans croissant apple
                                            pie. Oat cake brownie pudding jelly beans. Wafer liquorice chocolate
                                            bar chocolate bar liquorice. Tootsie roll gingerbread gingerbread
                                            chocolate bar tart chupa chups sugar plum toffee. Carrot cake
                                            macaroon sweet danish. Cupcake soufflé toffee marzipan candy
                                            canes pie jelly-o. Cotton candy bonbon powder topping carrot
                                            cake cookie caramels lemon drops liquorice. Dessert cookie ice
                                            cream toffee apple pie.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Hoverable rows end -->
    </div>
@endsection

@push('js')
    <script>
        $('#create-faq-form').on('submit', function (e) {
            e.preventDefault();

            let url = "{{ route('dashboard.faqs.store') }}";
            let data = new FormData(this);

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,

                success: function (data) {
                },

                error: function (data) {
                    $.each(data.responseJSON.errors, function (key, value) {
                        $('#error-list').append('<li>' + value[0] + '</li>');
                        $('#error-block').show();
                        $('#createFaqModal').modal('show');
                    })
                },
            });

        });
    </script>

    <script>

        $(document).on('click', '.delete-faq', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = "{{ route('dashboard.faqs.destroy' ,':id') }}";
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

        })
    </script>

@endpush

