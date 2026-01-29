@extends('layouts.website.app')
@section('title' , __('website.brands'))

@section('content')

    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.home') }}">{{ __('website.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)" class="text-secondary">{{ __('website.brands') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('website.brands') }}</h1>
            </div>
        </div>
    </section>


    <section class="product brand" data-aos="fade-up">
        <div class="container">

            <div class="brand-section" style="margin-bottom: 9rem; gap: 1rem">
                @forelse($brands as $brand)
                    <div class="product-wrapper m-3 ">
                        <div class="wrapper-img">
                            <a href="{{ route('website.brand.products', $brand->slug) }}">
                                <img src="{{ asset($brand->image) }}" alt="img">
                            </a>
                        </div>
                    </div>
                @empty
                    <p>{{ __('website.no_brands_found') }}</p>
                @endforelse

            </div>
        </div>
    </section>
@endsection