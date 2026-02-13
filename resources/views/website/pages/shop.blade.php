@extends('layouts.website.app')
@section('title', __('website.shop'))

@section('content')

    <section class="product product-sidebar footer-padding">
        @livewire('website.shop.shop')
    </section>

@endsection

@push('js')
    <script>
        document.addEventListener("livewire:init", function () {
            if ($("#slider-tooltips").length > 0) {

                var tooltipSlider = document.getElementById("slider-tooltips");

                noUiSlider.create(tooltipSlider, {
                    start: [0, 20000],
                    connect: true,
                    range: {
                        min: 0,
                        max: 50,
                    },
                });

                var minEl = document.getElementById("slider-margin-value-min");
                var maxEl = document.getElementById("slider-margin-value-max");

                tooltipSlider.noUiSlider.on("change", function (values) {

                    let min = Math.round(values[0]);
                    let max = Math.round(values[1]);

                    minEl.innerHTML = "$" + min;
                    maxEl.innerHTML = "$" + max;

                    Livewire.dispatch('priceUpdated', [min, max]);

                });
            }
        });
    </script>
@endpush
