<section class="product brand" data-aos="fade-up">
    <div class="container">
        <div class="section-title">
            <h5>{{ __('website.view_brands') }}</h5>
            <a href="{{ route('website.brand.index') }}" class="view">{{ __('website.view_brands') }}</a>
        </div>
        <div class="brand-section">
            @forelse($brands as $brand)
            <div class="product-wrapper">
                <div class="wrapper-img">
                    <a href="product-sidebar.html">
                        <img src="{{ asset($brand->image) }}" alt="img">
                    </a>
                </div>
            </div>
                @empty
                <p>No brands found</p>
            @endforelse

        </div>
    </div>
</section>
