@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.settings') }}
@endsection


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.settings') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.settings') }}
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

                    <div class="card-content collapse show">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"
                                            id="row-separator-colored-controls">{{ __('dashboard.settings') }}</h4>
                                        <a class="heading-elements-toggle"><i class="la la-settings font-medium-3"></i></a>
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
                                        <div class="card-body">
                                            <form class="form form-horizontal row-separator" id="setting-form"
                                                  method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="la la-eye"></i> head</h4>
                                                    {{--    site name--}}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="site_name_ar">{{ __('dashboard.site_name_ar') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="site_name_ar" readonly
                                                                           class="form-control border-primary"
                                                                           name="site_name[ar]"
                                                                           value="{{ $setting->getTranslation('site_name', 'ar') }}">
                                                                    <span class="text-danger error"
                                                                          id="error_site_name_ar"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="site_name_en">{{ __('dashboard.site_name_en') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="site_name_en" readonly
                                                                           class="form-control border-primary"
                                                                           name="site_name[en]"
                                                                           value="{{ $setting->getTranslation('site_name', 'en') }}">
                                                                    <span class="text-danger error"
                                                                          id="error_site_name_en"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--site desc--}}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row last">
                                                                        <label class="col-md-3 label-control"
                                                                               for="site_desc_ar">{{ __('dashboard.site_desc_ar') }}</label>
                                                                        <div class="col-md-9">
                                                                             <textarea id="site_desc_ar" rows="6"
                                                                                       class="form-control border-primary"
                                                                                       name="site_desc[ar]"
                                                                                       readonly>{{ $setting->getTranslation('site_desc', 'ar') }}</textarea>
                                                                            <span class="text-danger error"
                                                                                  id="error_site_desc_ar"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row last">
                                                                        <label class="col-md-3 label-control"
                                                                               for="site_desc_en">{{ __('dashboard.site_desc_en') }}</label>
                                                                        <div class="col-md-9">
                                                                             <textarea id="site_desc_en" rows="6"
                                                                                       class="form-control border-primary"
                                                                                       name="site_desc[en]"
                                                                                       readonly>{{ $setting->getTranslation('site_desc', 'en') }}</textarea>
                                                                            <span class="text-danger error"
                                                                                  id="error_site_desc_en"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--meta desc--}}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row last">
                                                                        <label class="col-md-3 label-control"
                                                                               for="meta_desc_ar">{{ __('dashboard.meta_desc_ar') }}</label>
                                                                        <div class="col-md-9">
                                                                             <textarea id="meta_desc_ar" rows="6"
                                                                                       class="form-control border-primary"
                                                                                       name="meta_desc[ar]"
                                                                                       readonly>{{ $setting->getTranslation('meta_desc', 'ar') }}</textarea>
                                                                            <span class="text-danger error"
                                                                                  id="error_meta_desc_ar"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row last">
                                                                        <label class="col-md-3 label-control"
                                                                               for="meta_desc_en">{{ __('dashboard.meta_desc_en') }}</label>
                                                                        <div class="col-md-9">
                                                                             <textarea id="meta_desc_en" rows="6"
                                                                                       class="form-control border-primary"
                                                                                       name="meta_desc[en]"
                                                                                       readonly>{{ $setting->getTranslation('meta_desc', 'en') }}</textarea>
                                                                            <span class="text-danger error"
                                                                                  id="error_meta_desc_en"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--  copy right--}}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="site_copy_right_ar">{{ __('dashboard.site_copy_right_ar') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="site_copy_right_ar" readonly
                                                                           class="form-control border-primary"
                                                                           name="site_copy_right[ar]"
                                                                           value="{{ $setting->getTranslation('site_copy_right', 'ar') }}">
                                                                    <span class="text-danger error"
                                                                          id="error_site_copy_right_ar"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="site_copy_right_en">{{ __('dashboard.site_copy_right_en') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="site_copy_right_en" readonly
                                                                           class="form-control border-primary"
                                                                           name="site_copy_right[en]"
                                                                           value="{{ $setting->getTranslation('site_copy_right', 'en') }}">
                                                                    <span class="text-danger error"
                                                                          id="error_site_copy_right_en"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section"><i
                                                                class="la la-envelope mt-2"></i> {{ __('dashboard.links') }}
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="site_email">{{ __('dashboard.site_email') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="site_email" readonly
                                                                           class="form-control border-primary"
                                                                           name="site_email"
                                                                           value="{{ $setting->site_email }}">
                                                                    <span class="text-danger error"
                                                                          id="error_site_email"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="email_support">{{ __('dashboard.email_support') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="email_support" readonly
                                                                           class="form-control border-primary"
                                                                           name="email_support"
                                                                           value="{{ $setting->email_support }}">
                                                                    <span class="text-danger error"
                                                                          id="error_email_support"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="linkedin">{{ __('dashboard.linkedin') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="linkedin" readonly
                                                                           class="form-control border-primary"
                                                                           name="linkedin"
                                                                           value="{{ $setting->linkedin }}">
                                                                    <span class="text-danger error"
                                                                          id="error_linkedin"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="instagram">{{ __('dashboard.instagram') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="instagram" readonly
                                                                           class="form-control border-primary"
                                                                           name="instagram"
                                                                           value="{{ $setting->instagram }}">
                                                                    <span class="text-danger error"
                                                                          id="error_instagram"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="facebook">{{ __('dashboard.facebook') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="facebook" readonly
                                                                           class="form-control border-primary"
                                                                           name="facebook"
                                                                           value="{{ $setting->facebook }}">
                                                                    <span class="text-danger error"
                                                                          id="error_facebook"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="youtube">{{ __('dashboard.youtube') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="youtube" readonly
                                                                           class="form-control border-primary"
                                                                           name="youtube"
                                                                           value="{{ $setting->youtube }}">
                                                                    <span class="text-danger error"
                                                                          id="error_youtube"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"
                                                                       for="promotion_video_url">{{ __('dashboard.promotion_video_url') }}</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="promotion_video_url" readonly
                                                                           class="form-control border-primary"
                                                                           name="promotion_video_url"
                                                                           value="{{ $setting->promotion_video_url }}">
                                                                    <span class="text-danger error"
                                                                          id="error_promotion_video_url"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4 class="form-section"><i
                                                                class="la la-envelope mt-2"></i> {{ __('dashboard.image') }}
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-2 label-control"
                                                                       for="logo">{{ __('dashboard.logo') }}</label>
                                                                <div class="col-md-10">
                                                                    <input type="file" id="logo"
                                                                           class="form-control border-primary"
                                                                           name="logo"
                                                                           value="{{ asset($setting->logo) }}">
                                                                    <span class="text-danger error"
                                                                          id="error_logo"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-md-2 label-control"
                                                                       for="favicon">{{ __('dashboard.favicon') }}</label>
                                                                <div class="col-md-10">
                                                                    <input type="file" id="favicon"
                                                                           class="form-control border-primary"
                                                                           name="favicon"
                                                                           value="{{ asset($setting->favicon) }}">
                                                                    <span class="text-danger error"
                                                                          id="error_favicon"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-actions right">
                                                    <button type="button" id="cancel"
                                                            class="btn btn-warning mr-1 hidden">
                                                        <i class="la la-remove"></i> {{ __('dashboard.cancel') }}
                                                    </button>
                                                    <button type="submit" id="save" class="btn btn-primary hidden">
                                                        <i class="la la-check"></i> {{ __('dashboard.save') }}
                                                    </button>
                                                    <button type="button" id="edit" class="btn btn-primary">
                                                        <i class="la la-edit"></i> {{ __('dashboard.edit') }}
                                                    </button>
                                                </div>
                                            </form>
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
@include('incloudes.file-input.links')
@push('js')

    <script>
        $(document).ready(function () {
            let lang = "{{ app()->getLocale() }}";

            $('#edit').on('click', function () {
                $('input, textarea').removeAttr('readonly');
                $('#edit').addClass('hidden');
                $('#cancel').removeClass('hidden');
                $('#save').removeClass('hidden');

            });

            $('#cancel').on('click', function () {
                $('.error').empty();
                $('input, textarea').attr('readonly', true);
                $('#edit').removeClass('hidden');
                $('#cancel').addClass('hidden');
                $('#save').addClass('hidden');
                let data = @json($setting);
                $('#site_name_ar').empty().val(data.site_name.ar);
                $('#site_name_en').empty().val(data.site_name.en);
                $('#site_desc_ar').empty().val(data.site_desc.ar);
                $('#site_desc_en').empty().val(data.site_desc.en);
                $('#meta_desc_ar').empty().val(data.meta_desc.ar);
                $('#meta_desc_en').empty().val(data.meta_desc.en);
                $('#site_copy_right_ar').empty().val(data.site_copy_right.ar);
                $('#site_copy_right_en').empty().val(data.site_copy_right.en);
                $('#site_email').empty().val(data.site_email);
                $('#email_support').empty().val(data.email_support);
                $('#linkedin').empty().val(data.linkedin);
                $('#instagram').empty().val(data.instagram);
                $('#facebook').empty().val(data.facebook);
                $('#youtube').empty().val(data.youtube);
                $('#promotion_video_url').empty().val(data.promotion_video_url);

            });

            $("#logo").fileinput({
                theme: "fa5",
                language: lang,
                showUpload: false,
                showCancel: false,
                showClose: true,
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                @if(!is_null($setting->logo))
                initialPreviewAsData: true,
                initialPreview: ['{{ asset($setting->logo) }}'],
                @endif
            });

            $("#favicon").fileinput({
                theme: "fa5",
                language: lang,
                showUpload: false,
                showCancel: false,
                showClose: true,
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                @if(!is_null($setting->favicon))
                initialPreviewAsData: true,
                initialPreview: ['{{ asset($setting->favicon) }}'],
                @endif
            });


            $('#setting-form').on('submit', function (e) {
                e.preventDefault();
                alert('hello');

                let url = "{{ route('dashboard.settings.update') }}";
                let formData = new FormData(this);
                formData.append('_method', 'PUT');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status === true) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('#edit').removeClass('hidden');
                            $('#cancel').addClass('hidden');
                            $('#save').addClass('hidden');
                            $('#site_name_ar').empty().val(data.setting.site_name.ar).attr('readonly', true);
                            $('#site_name_en').empty().val(data.setting.site_name.en).attr('readonly', true);
                            $('#site_desc_ar').empty().val(data.setting.site_desc.ar).attr('readonly', true);
                            $('#site_desc_en').empty().val(data.setting.site_desc.en).attr('readonly', true);
                            $('#meta_desc_ar').empty().val(data.setting.meta_desc.ar).attr('readonly', true);
                            $('#meta_desc_en').empty().val(data.setting.meta_desc.en).attr('readonly', true);
                            $('#site_copy_right_ar').empty().val(data.setting.site_copy_right.ar).attr('readonly', true);
                            $('#site_copy_right_en').empty().val(data.setting.site_copy_right.en).attr('readonly', true);
                            $('#site_email').empty().val(data.setting.site_email).attr('readonly', true);
                            $('#email_support').empty().val(data.setting.email_support).attr('readonly', true);
                            $('#linkedin').empty().val(data.setting.linkedin).attr('readonly', true);
                            $('#instagram').empty().val(data.setting.instagram).attr('readonly', true);
                            $('#facebook').empty().val(data.setting.facebook).attr('readonly', true);
                            $('#youtube').empty().val(data.setting.youtube).attr('readonly', true);
                            $('#promotion_video_url').empty().val(data.setting.promotion_video_url).attr('readonly', true);
                            $('.error').empty();
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
                            $('#error_' + key).empty().text(value[0]);
                        });
                    },
                });

            });
        });
    </script>
@endpush
