<div>
    <div class="price">
        @if($product->isSimple())
            @if($product->has_discount)
                <span class="price-cut">${{ $product->price }}</span>
                <span class="new-price">${{ $product->getPriceAfterDiscount() }}</span>
            @else
                <span class="new-price">${{ $product->price }}</span>
            @endif
        @else
            <span class="new-price">{{ $price }}</span>

        @endif
    </div>
    <p class="content-paragraph">
        {{ $product->small_desc }}
    </p>
    <hr>
    <div class="product-availability">
        <span>{{ __('website.availability') }} : </span>
        @if($product->isSimple())
            @if($product->manage_stock)
                <span class="inner-text">{{ $qty }}</span>
            @else
                <span class="inner-text"> {{ __('website.products_available') }}</span>
            @endif
        @else
            <span class="inner-text"> {{ $qty }}</span>
        @endif
    </div>

    @if(!$product->isSimple())
        <div class="product-size">
            <P class="size-title">{{ __('website.variants') }}</P>
            <div class="size-section">
                <span class="size-text">{{ __('website.select_your_variant') }}</span>
                <div class="toggle-btn">
                    <span class="toggle-btn2"></span>
                    <span class="chevron">
                <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.4 6.8L0 1.4L1.4 0L5.4 4L9.4 0L10.8 1.4L5.4 6.8Z" fill="#222222"/>
                </svg>
                </span>
                </div>
            </div>
            <ul class="size-option">
                @foreach($variants as $variant)
                    <a wire:click.prevent="secletVarint({{ $variant->id }})" class="option">
                        @foreach($variant->variantAttributes as $attribute)
                            <span class="option-text">{{ $attribute->attributeValue->attribute->getTranslation('name',app()->getLocale()) }} : {{ $attribute->attributeValue->getTranslation('value',app()->getLocale()) }}</span>
                        @endforeach
                    </a>
                @endforeach

            </ul>
        </div>
    @endif
</div>