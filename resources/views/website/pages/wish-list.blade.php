@extends('layouts.website.app')
@section('title' , __('website.wish_list'))

@section('content')

    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.home') }}">{{ __('website.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)" class="text-secondary">{{ __('website.wish_list') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('website.wish_list') }}</h1>
            </div>
        </div>
    </section>

    @livewire('website.wish-list.wish-last-table',['wishLists' => $wishLists])
@endsection

@push('js')
    <script>
        document.addEventListener('livewire:init',()=>{
            Livewire.on('not-found', function (message) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 2000
                });
            });
            Livewire.on('wishlist-changed', (message) => {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 2000
                });

            });
        })
    </script>

@endpush