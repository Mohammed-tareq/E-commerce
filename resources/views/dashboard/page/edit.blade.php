@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.pages') }} | {{ __('dashboard.edit_page') }}
@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.edit_page') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.pages.index') }}">{{ __('dashboard.pages') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.edit_page') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('dashboard.edit_page') }}</h4>

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
                                    @include('incloudes.validate-error')
                                    <div class="card-body">
                                        <form class="form" method="POST" enctype="multipart/form-data"
                                              action="{{ route('dashboard.pages.update',$page->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i
                                                            class="ft-shield"></i>{{ __('dashboard.page') }}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.title.ar') }}</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="{{ __('placeHolder.title_ar') }}"
                                                                   value="{{ old('title.ar',$page->getTranslation('title', 'ar')) }}"
                                                                   name="title[ar]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.title_en') }}</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="{{ __('placeHolder.title_en') }}"
                                                                   value="{{ old('title.en',$page->getTranslation('title', 'en')) }}"
                                                                   name="title[en]">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.content_ar') }}</label>
                                                            <textarea name="content[ar]" class="form-control" id="summernote_ar">
                                                               {{ old('content.ar',$page->getTranslation('content', 'ar')) }}
                                                           </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.content_en') }}</label>
                                                            <textarea name="content[en]" class="form-control" id="summernote_en">
                                                               {{ old('content.en',$page->getTranslation('content', 'en')) }}
                                                           </textarea>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="single-image">{{ __('dashboard.image') }}</label>
                                                            <input type="file" class="form-control"
                                                                   name="image" id="single-image-page">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="status">{{ __('dashboard.status') }}</label>
                                                            <select name="status" id="status" class="form-control"`>
                                                                <option @selected($page->status === __('dashboard.Inactive')) value="0">{{ __('dashboard.Inactive') }}</option>
                                                                <option @selected($page->status === __('dashboard.Active')) value="1">{{ __('dashboard.Active') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <a href="{{ url()->previous() }}" type="reset" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                                                    </a>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> {{ __('dashboard.edit') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection
@include( 'incloudes.file-input.links')
@push('js')
    <script>
        let lang = "{{ app()->getLocale() }}";
        $("#single-image-page").fileinput({
            theme: "fa5",
            language: lang,
            showUpload: false,
            showCancel: false,
            showClose: true,
            maxFileCount: 1,
            allowedFileTypes: ['image'],
            allowedFileExtensions: ['jpg','jpeg','png','gif','svg','webp'],

            initialPreviewAsData: true,
            initialPreview: ['{{ asset('uploads/pages/'.$page->image) }}'],
            initialPreviewConfig: [
                {
                    "caption": "{{ $page->getTranslation('title', app()->getLocale()) }}",
                    "width": "100px",
                    "url": "{{ route('dashboard.page.delete.image',  $page->id ) }}",
                    "key": {{ $page->id }},
                    'extra': {
                        '_token': '{{ csrf_token() }}',
                    },
                    'method':'POST'
                },
            ],

        });
        $("#single-image-page").on('filedeleted', function(event, key, jqXHR, data) {

            Swal.fire({
                icon: 'success',
                title: data.message,
                timer: 2000,
                showConfirmButton: false
            });
        });


    </script>
@endpush


@include('incloudes.summernote.link')

@push('js')
    <script>
        $('#summernote_ar').summernote({
            placeholder: 'اكتب هنا',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    <script>
        $('#summernote_en').summernote({
            placeholder: 'write here',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush


