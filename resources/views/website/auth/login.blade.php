@extends('layouts.website.app')

@section('title' , __('website.login'))

@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">Log In</h5>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action = "{{ route('website.login.post') }}" id="login-form" method="post" class="form-horizontal">
                        @csrf
                        <div class="review-inner-form">
                            <div class="review-form-name">
                                <label for="email" class="form-label">Email Address**</label>
                                <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Email"
                                />
                            </div>
                            <div class="review-form-name">
                                <label for="password" class="form-label">Password*</label>
                                <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="password"
                                />
                            </div>
                            <div class="review-form-name checkbox">
                                <div class="checkbox-item">
                                    <input type="checkbox" name="remember"/>
                                    <span class="address"> Remember Me</span>
                                </div>
                                <div class="forget-pass">
                                    <p>Forgot password?</p>
                                </div>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <a href="javascript:void(0);" onclick="document.getElementById('login-form').submit();" class="shop-btn">Log In</a>
                            <span class="shop-account"
                            >Dont't have an account ?<a href="{{ route('website.register') }}"
                                >Sign Up Free</a
                                ></span
                            >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection