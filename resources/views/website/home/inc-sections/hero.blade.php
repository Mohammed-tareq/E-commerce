<section id="hero" class="hero">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper hero-wrapper">
           @foreach ($sliders as $slider)
                <div class="swiper-slide hero-slider-one"
                     style="background: url('{{ asset($slider->image) }}') no-repeat center center / cover;">

                <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">

                                    <h2 class="wrapper-details">{{ $slider->note }}</h2>
                                    <a href="product-sidebar.html" class="shop-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

           @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
