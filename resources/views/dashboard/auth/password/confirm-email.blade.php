@extends('layouts.dashboard.auth.auth')

@section('title')
    Email Confirm
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
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset('assets/dashboard') }}/images/logo/logo-dark.png" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{ __('auth.otp_input') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" autocomplete="off" action="{{ route('dashboard.verify.email.otp') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $email }}">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control form-control-lg input-lg" id="user-email"
                                                      name="otp" placeholder="{{ __('auth.otp_input') }}" required>
                                                <div class="form-control-position">
                                                    <i class="ft-mail"></i>
                                                </div>
                                                @error('otp')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i> {{ __('auth.otp_check') }}</button>
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
