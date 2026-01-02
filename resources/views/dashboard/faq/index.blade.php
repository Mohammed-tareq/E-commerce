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
                        </div>


                        <div class="card-body card-dashboard">
                            <div class="col-md-12">
                                <div class="card" id="headingCollapse51">
                                    @forelse($faqs as $faq)
                                        <div id="faq_container_{{ $faq->id }}">
                                            <div role="tabpanel" class="card-header border-success">
                                                <a id="faq_question_{{ $faq->id }}" data-toggle="collapse"
                                                   href="#collapse51_{{ $faq->id }}"
                                                   aria-expanded="true"
                                                   aria-controls="collapse51_{{ $faq->id }}"
                                                   class="font-medium-1 primary">{{ $faq->getTranslation('question',app()->getLocale()) }}</a>
                                                <a href="javascript:void(0)" class=" float-right delete-faq"
                                                   data-id="{{ $faq->id }}">
                                                    <i class="danger la la-trash"></i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                   class="edit-faq float-right mx-2"
                                                   data-id="{{ $faq->id }}"
                                                   data-toggle="modal"
                                                   data-target="#editFaqModal-{{ $faq->id }}">
                                                    <i class="primary la la-edit"></i>
                                                </a>

                                            </div>
                                            @include('dashboard.faq.edit', ['faq'=>$faq])
                                            <div id="collapse51_{{ $faq->id }}" role="tabpanel"
                                                 aria-labelledby="headingCollapse51"
                                                 class="card-collapse collapse @if($loop->first) show @endif"
                                                 aria-expanded="true">
                                                <div class="card-body" id="faq_answer_{{ $faq->id }}">
                                                    {{ $faq->getTranslation('answer',app()->getLocale()) }}
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="d-flex justify-content-center ">
                                            <p>No FAQ </p>
                                        </div>
                                    @endforelse
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

        $(document).on('click', '#create-faq', function (e) {
            e.preventDefault();
            $('#error-list-edit').empty();
            $('#error-block-edit').hide();
        })


        $('#create-faq-form').on('submit', function (e) {
            e.preventDefault();

            let url = "{{ route('dashboard.faqs.store') }}";
            let data = new FormData(this);
            let lang = "{{ app()->getLocale() }}"

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,

                success: function (data) {
                    console.log(data.faq.id);
                    if (data.status === true) {
                        $('#headingCollapse51').prepend(`<div role="tabpanel" class="card-header border-success">
                                            <a id="faq_question_${data.faq.id}" data-toggle="collapse" href="#collapse51_${data.faq.id}"
                                               aria-expanded="true"
                                               aria-controls="collapse51_${data.faq.id}"
                                               class="font-medium-1 primary">${data.faq.question[lang]}</a>
                                            <a href="javascript:void(0)" class=" float-right delete-faq" data-id="${data.faq.id}">
                                                <i class="danger la la-trash"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                               class="edit-faq float-right mx-2"
                                               data-id="${data.faq.id}"
                                               data-toggle="modal"
                                               data-target="#editFaqModal-${data.faq.id}">
                                                <i class="primary la la-edit"></i>
                                            </a>
                                        </div>
                        <div id="collapse51_${data.faq.id}" role="tabpanel"
                                             aria-labelledby="headingCollapse51"
                                             class="card-collapse collapse"
                                             aria-expanded="true">
                                            <div class="card-body" id="faq_answer_${data.faq.id}">
                                                ${data.faq.answer[lang]}
                        </div>
                    </div>`)
                        $('#create-faq-form')[0].reset();
                        $('#createFaqModal').modal('hide');
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
                        $('#error-list').append('<li>' + value[0] + '</li>');
                        $('#error-block').show();
                        $('#createFaqModal').modal('show');
                    })
                },
            });

        });
    </script>


    {{--   update faq --}}
    <script>

        $(document).on('click', '.edit-faq', function (e) {
            e.preventDefault();
            $('#error-list-edit').empty();
            $('#error-block-edit').hide();
        });

        $('#update-coupon-form').on('submit',function(e){
            e.preventDefault();
            $('#error-list-edit').empty();
            $('#error-block-edit').hide();
            let id = $('.edit-faq').data('id');
            let url = "{{ route('dashboard.faqs.update' ,':id') }}";
            url = url.replace(':id', id);
            let data = new FormData(this);
            data.append('_method', 'PUT');
            let lang = "{{ app()->getLocale() }}"

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                processData: false,
                contentType: false,

                success: function (data) {
                    if (data.status === true) {
                        $('#editFaqModal-' + id).modal('hide');
                        $('#faq_question_' + id).empty().text(data.faq.question[lang]).removeClass('primary').addClass('danger');
                        $('#faq_answer_' + id).empty().text(data.faq.answer[lang]);
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
                        $('#error-list-edit').append('<li>' + value[0] + '</li>');
                        $('#error-block-edit').show();
                        $('#editFaqModal-' + id).modal('show');
                    })
                },
            });
        })
    </script>

    {{--    delete faq--}}
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
                                $('#faq_container_'+id).remove();
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

