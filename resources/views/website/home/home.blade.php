@extends('layouts.website.app')
@section('title' , __('website.home'))

@section('content')

    @include('website.home.inc-sections.hero', compact('sliders'))

    @include('website.home.inc-sections.fashion')

    @if($categories->count() > 0)
        @include('website.home.inc-sections.category', compact('categories'))
    @endif

    @if($brands->count() > 0)
        @include('website.home.inc-sections.brand', compact('brands'))
    @endif


    @if($newArrivals->count() > 0)
        @include('website.home.inc-sections.arrival', compact('newArrivals'))
    @endif

    @if($flashProducts->count() > 0)
        @include('website.home.inc-sections.flash-sale', compact('flashProducts'))
    @endif

    @include('website.home.inc-sections.top-selling')

    @include('website.home.inc-sections.best-seller')

    @include('website.home.inc-sections.weekly-sale')

    @if($flashProduct->count() > 0)
        @include('website.home.inc-sections.best-product', compact('flashProduct'))
    @endif
@endsection