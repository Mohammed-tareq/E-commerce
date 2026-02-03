<div class="container">
    @if(!empty($cartItems->items))

        <div class="cart-section">
            <table>
                <tbody>
                <tr class="table-row table-top-row">
                    <td class="table-wrapper wrapper-product">
                        <h5 class="table-heading">{{ __('website.product') }}</h5>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">{{ __('website.price') }}</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">{{ __('website.quantity') }}</h5>
                        </div>
                    </td>
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">{{ __('website.attributes') }}</h5>
                        </div>
                    </td>
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">{{ __('website.total') }}</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">{{ __('website.action') }}</h5>
                        </div>
                    </td>
                </tr>

                @foreach($cartItems->items as $item)
                    <tr class="table-row ticket-row" wire:key="{{ $item->id }}">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    <img src="{{ asset($item->product->images->first()->name) }}"
                                         alt="{{ $item->product->getTranslation('name', app()->getLocale()) }}">
                                </div>
                                <div class="wrapper-content">
                                    <a href="{{ route('website.product.show', $item->product->slug) }}" style="cursor: pointer" class="heading">{{ $item->product->getTranslation('name', app()->getLocale()) }}</a>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="heading">${{ $item->price }}</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <div class="quantity">
                                    <a style="cursor: pointer" wire:click.prevent="decrementQty({{ $item->id }})">
                                        -
                                    </a>
                                    <span class="number">{{ $item->quantity }}</span>
                                    <a style="cursor: pointer" wire:click.prevent="incrementQty({{ $item->id }})">
                                        +
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                @if($item->product->has_variants)
                                    @foreach($item->attributes as $key => $value)
                                        <p class="size-title">{{ $key }}  {{ $value }}</p>
                                    @endforeach
                                @else
                                    <h5 class="heading">{{ __('website.no_variants') }}</h5>
                                @endif
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                                <h5 class="heading">${{ $item->total_price }}</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center" style="cursor: pointer"
                                 wire:click.prevent="removeItem({{ $item->id }})">
                                <a>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                fill="#AAAAAA"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="wishlist-btn cart-btn">
            <a href="#" class="clean-btn" wire:click.prevent="cleanCart">{{ __('website.clean_cart') }}</a>
            <a href="javascript:void(0)" class="shop-btn update-btn"
               @click="$dispatch('update-cart')">{{ __('website.update_cart') }}</a>
            <a href="{{ route('website.checkout.index') }}" class="shop-btn">{{ __('website.go_to_checkout') }}</a>
        </div>
    @else
        <div class="blog-item" data-aos="fade-up">
            <div class="cart-img">
                <img src="{{ asset('assets/website/assets/images/homepage-one/empty-cart.webp') }}" alt="">
            </div>
            <div class="cart-content">
                <p class="content-title">{{ __('website.empty_cart') }} </p>
                <a href="product-sidebar.html" class="shop-btn">{{ __('website.back_to_shop') }}</a>
            </div>
        </div>
    @endif
</div>


