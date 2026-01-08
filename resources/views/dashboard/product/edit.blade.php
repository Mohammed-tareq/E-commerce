@extends('layouts.dashboard.app')

@section('title')
    {{ __('dashboard.product') }} | {{ __('dashboard.edit_product') }}
@endsection

@include('dashboard.product.product-css')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.edit_product') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.products.index') }}">{{ __('dashboard.product') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.edit_product') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('dashboard.product') }}</h4>

                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        @livewire('dashboard.product.edit-product', ['categories' => $categories, 'brands' => $brands, 'attributesItem' => $attributesItem,'productId' => $productId])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection



@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Tagify(document.getElementById('tags'));
        });



{{--        document.addEventListener('livewire:init', () => {--}}
{{--            Livewire.on('openFullScreenImage', () => {--}}
{{--                $('#fullscreenModal').modal('show');--}}
{{--            });--}}
{{--        });--}}

{{--        setInterval(() => {--}}
{{--                $('#successMessageWire').hide()--}}
{{--            }--}}
{{--            , 8000)--}}
    </script>
@endpush
