<section class="product brand" data-aos="fade-up">
    <div class="container">
        <div class="section-title">
            <h5>{{ __('website.view_brands') }}</h5>
            <a href="{{ route('website.brand.index') }}" class="view">{{ __('website.view_brands') }}</a>
        </div>
        <div class="brand-section">
            @forelse($brands as $brand)
                <a href="{{ route('website.brand.products', $brand->slug) }}">
                    <div class="product-wrapper">
                        <div class="wrapper-img">
                            <img src="{{ asset($brand->image) }}" alt="img">
                        </div>
                    </div>
                </a>
            @empty
                <p>{{ __('website.no_brands_found') }}</p>
            @endforelse

        </div>
    </div>
</section>
