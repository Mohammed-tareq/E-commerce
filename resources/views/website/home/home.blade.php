@extends('layouts.website.app')
@section('title' , __('website.home'))

@section('content')

    @include('website.home.inc-sections.hero', compact('sliders'))

    @include('website.home.inc-sections.fashion')

    @include('website.home.inc-sections.category')

    @include('website.home.inc-sections.brand')

    @include('website.home.inc-sections.arrival')

    @include('website.home.inc-sections.flash-sale')

    @include('website.home.inc-sections.top-selling')

    @include('website.home.inc-sections.best-seller')

    @include('website.home.inc-sections.weekly-sale')

    @include('website.home.inc-sections.best-product')


@endsection