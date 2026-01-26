@extends('layouts.website.app')

@section('title' , __('website.register'))

@section('content')
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form">
                    <h5 class="comment-title">{{ __('website.create_account') }}</h5>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('website.register.post') }}" method="post" id="register-form">
                        @csrf
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="first_name" class="form-label">{{ __('website.first_name') }}*</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                       placeholder="{{ __('website.placeholder_first_name') }}">
                            </div>
                            <div class="review-form-name">
                                <label for="last_name" class="form-label">{{ __('website.last_name') }}*</label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                       placeholder="{{ __('website.placeholder_last_name') }}">
                            </div>
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="email" class="form-label">{{ __('website.email') }}*</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="{{ __('website.placeholder_email') }}">
                            </div>
                            <div class="review-form-name">
                                <label for="phone" class="form-label">{{ __('website.phone') }}*</label>
                                <input type="tel" name="phone" id="phone" class="form-control"
                                       placeholder="{{ __('website.placeholder_phone') }}">
                            </div>
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="password" class="form-label">{{ __('website.password')  }}*</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="{{ __('website.placeholder_password') }}">
                            </div>
                            <div class="review-form-name">
                                <label for="password_confirmation" class="form-label">{{ __('website.password_confirm') }}*</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control"
                                       placeholder="{{ __('website.placeholder_password_confirmation') }}">
                            </div>

                        </div>

                        <div class="review-form-name">
                            @livewire('general.address-drop-down')
                        </div>
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" required>
                                <p class="remember">
                                   {{ __('website.i_agree') }} <span class="inner-text">ShopUs.</span></p>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <a href="javascript:void(0);" onclick="document.getElementById('register-form').submit();"
                               class="shop-btn">{{ __('website.create_account') }}</a>
                            <span class="shop-account">{{ __('website.have_account') }} ?<a href="{{ route('website.login') }}">Log In</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection