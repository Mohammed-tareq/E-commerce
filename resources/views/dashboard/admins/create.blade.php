@extends('layouts.dashboard.app')

@section('title')
Admins | Create
@endsection



@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.create_admin') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.roles.index') }}">{{ __('dashboard.admins') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.create_admin') }}
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
                                    <h4 class="card-title">{{ __('dashboard.create_admin') }}</h4>

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
                                        <form class="form" method="POST" action="{{ route('dashboard.admins.store') }}">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i
                                                            class="ft-shield"></i>{{ __('dashboard.admins') }}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.name') }}</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="{{ __('placeHolder.name') }}"
                                                                   name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{ __('dashboard.email') }}</label>
                                                            <input type="email" id="projectinput2" class="form-control"
                                                                   placeholder="{{ __('placeHolder.email') }}"
                                                                   name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.roles') }}</label>
                                                            <select name="role_id" id="projectinput1"
                                                                    class="form-control">
                                                                <option selected
                                                                        disabled>{{ __('dashboard.select_role') }}</option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}">{{ $role->getTranslation('name', app()->getLocale()) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.status') }}</label>
                                                            <select name="status" id="projectinput1"
                                                                    class="form-control">
                                                                <option selected
                                                                        value="1">{{ __('dashboard.active') }}</option>
                                                                <option value="0">{{ __('dashboard.inActive') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ __('dashboard.password') }}</label>
                                                            <input type="password" id="projectinput1"
                                                                   class="form-control"
                                                                   placeholder="{{ __('placeHolder.password') }}"
                                                                   name="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">{{ __('dashboard.password_confirm') }}</label>
                                                            <input type="password" id="projectinput2"
                                                                   class="form-control"
                                                                   placeholder="{{ __('placeHolder.password_confirmation') }}"
                                                                   name="password_confirmation">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1">
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





