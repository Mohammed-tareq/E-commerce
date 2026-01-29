@extends('layouts.website.app')
@section('title' , __('website.categories'))

@section('content')

    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.home') }}">{{ __('website.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)" class="text-secondary">{{ __('website.categories') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('website.categories') }}</h1>
            </div>
        </div>
    </section>


    <section class="product-category">
        <div class="container">
            <div class="category-section" style="margin-bottom: 9rem;">
                @forelse($categories as $category)
                    <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                        <div class="wrapper-img">
                            <img src="{{ asset($category->image) }}" alt="dress">
                        </div>
                        <div class="wrapper-info">
                            <a href="product-sidebar.html" class="wrapper-details">{{ $category->name }}</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center m-5 ">{{ __('website.no_categories_found') }}</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection