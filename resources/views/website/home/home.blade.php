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


    @if($homeProducts['newArrivals']->count() > 0)
        @include('website.home.inc-sections.arrival', ['newArrivals' => $homeProducts['newArrivals']])
    @endif

    @if($homeProducts['flashProductsTimer']->count() > 0)
        @include('website.home.inc-sections.flash-sale', ['flashProductsTimer' => $homeProducts['flashProductsTimer'] ])
    @endif

    @if($homeProducts['flashProductsWeek']->count() > 0)
        @include('website.home.inc-sections.flash-sale-week', ['flashProductsWeek' => $homeProducts['flashProductsWeek']])
    @endif


    @include('website.home.inc-sections.top-selling')

    @include('website.home.inc-sections.best-seller')

    @include('website.home.inc-sections.weekly-sale')


    @if($homeProducts['flashProducts']->count() > 0)
        @include('website.home.inc-sections.best-product', ['flashProducts' => $homeProducts['flashProducts'] ])
    @endif
@endsection