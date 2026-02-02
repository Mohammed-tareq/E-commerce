@extends('layouts.website.app')
@section('title' , __('website.check_out'))

@section('content')
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.home') }}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">{{ __('website.check_out') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('website.check_out') }}</h1>
            </div>
        </div>
    </section>


    <section class="checkout product footer-padding">
        <div class="container">
            <div class="checkout-section">
                <div class="row gy-5">
                    <div class="col-lg-6">
                        @livewire('website.check-out.shipping-details')
                    </div>
                    <div class="col-lg-6">
                        @livewire('website.check-out.order-summary')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

