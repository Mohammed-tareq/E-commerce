<section class="product-category">
    <div class="container ">
        <div class="section-title">
            <h5>{{ __('website.our_categories') }}</h5>
            <a href="{{ route('website.category.index') }}" class="view">{{ __('website.view_categories') }}</a>
        </div>
        <div class="category-section">
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
                <p>{{ __('website.no_categories_found') }}</p>
            @endforelse
        </div>
    </div>
</section>
