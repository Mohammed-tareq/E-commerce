@extends('layouts.dashboard.auth.auth')

@section('title')
    {{ __('auth.login') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1">
                                            <img src="{{ asset('assets/dashboard') }}/images/logo/logo-dark.png"
                                                 alt="branding logo">
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{ __('auth.login') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <form class="form-horizontal" action="{{ route('dashboard.login') }}" method="post"
                                        autocomplete="off">
                                            @csrf
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="user-name">{{ __('auth.email') }}</label>
                                                <input type="text" name="email" class="form-control" id="user-name"
                                                       placeholder="{{ __('auth.enter_email') }}">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group mb-1">
                                                <label for="user-password">{{ __('auth.password') }}</label>
                                                <input type="password" name="password" class="form-control" id="user-password"
                                                       placeholder="{{ __('auth.enter_password') }}">
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group mb-1">
                                                {!! NoCaptcha::display() !!}
                                                @error('g-recaptcha-response')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-sm-left">
                                                    <fieldset>
                                                        <input type="checkbox" name="remember_me" id="remember-me">
                                                        <label for="remember-me">{{ __('auth.remember_me') }}</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a
                                                            href="{{ route('dashboard.forget.password.show') }}"
                                                            class="card-link">{{ __('auth.forget_password') }}</a></div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-block"><i
                                                        class="ft-unlock"></i> {{ __('auth.login') }}</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection