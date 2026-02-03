<div>
    <div class="checkout-wrapper">
        <div class="account-section billing-section">
            <h5 class="wrapper-heading">{{ __('website.order_summary') }}</h5>
            <div class="order-summery">
                <div class="subtotal product-total">
                    <h5 class="wrapper-heading">{{ __('website.product') }}</h5>
                    <h5 class="wrapper-heading">{{ __('website.total') }}</h5>
                </div>
                <hr>
                <div class="subtotal product-total">
                    <ul class="product-list">
                        @foreach($cartItems->items as $item)
                            <li>
                                <div class="product-info">
                                    <h5 class="wrapper-heading">{{ $item->product->getTranslation('name',app()->getLocale()) }}</h5>
                                    @if(isset($item->attributes))
                                        @foreach($item->attributes as $key => $attribute)
                                            <p class="paragraph">{{ $key }} : {{ $attribute }} </p>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="price">
                                    <h5 class="wrapper-heading">${{ $item->price }}</h5>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <hr>
                <div class="subtotal product-total">
                    <h5 class="wrapper-heading">{{ __('website.subtotal') }}</h5>
                    <h5 class="wrapper-heading">${{ $cartItems->items()->sum('total_price') }}</h5>
                </div>
                <div class="subtotal product-total">
                    <ul class="product-list">
                        <li>
                            <div class="product-info">
                                <p class="paragraph">{{ __('website.shipping') }}</p>
                                <h5 class="wrapper-heading">Free Shipping</h5>
                            </div>
                            <div class="price">
                                <h5 class="wrapper-heading">+${{ $shippingPrice }}</h5>
                            </div>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="subtotal total">
                    <h5 class="wrapper-heading">{{ __('website.total') }}</h5>
                    <h5 class="wrapper-heading price">${{ $cartItems->items()->sum('total_price') + $shippingPrice }}</h5>
                </div>
                <a href="#" wire:click.prevent="changeShowCouponStatus"  class="shop-btn">{{ __('website.enter_coupon_code') }}</a>

            </div>
        </div>
    </div>
</div>
