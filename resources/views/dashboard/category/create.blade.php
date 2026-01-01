@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.categories') }} | {{ __('dashboard.create_category') }}
@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.create_category') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.categories.index') }}">{{ __('dashboard.categories') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.create_category') }}
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
                                    <h4 class="card-title">{{ __('dashboard.create_category') }}</h4>

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
                                        <form class="form" method="POST"
                                              action="{{ route('dashboard.categories.store') }}">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i
                                                            class="ft-shield"></i>{{ __('dashboard.categories') }}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.name_ar') }}</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="{{ __('placeHolder.name_ar') }}"
                                                                   name="name[ar]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.name_en') }}</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="{{ __('placeHolder.name_en') }}"
                                                                   name="name[en]">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.category_parent') }}</label>
                                                            <select name="parent" id="projectinput1"
                                                                    class="form-control">
                                                                <option value="">{{ __('dashboard.category_parent') }}</option>

                                                                @foreach ($categories as $cat)
                                                                    <option  value="{{ $cat->id }}">{{ $cat->getTranslation('name', app()->getLocale()) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.status') }}</label>
                                                            <select name="status" id="projectinput1"
                                                                    class="form-control">
                                                                <option value="1">{{ __('dashboard.Active') }}</option>
                                                                <option value="0">{{ __('dashboard.Inactive') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="reset" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> {{ __('dashboard.create') }}
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





