<div>
    @if ($screen === 'order')

        @if ($user->orders->count() > 0)
            <div class="overflow-x-auto show active">
                <table class="min-w-full bg-white border border-gray-200 text-sm">
                    <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-2">#</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Total</th>
                        <th class="p-2">Shipping</th>
                        <th class="p-2">Date</th>
                        <th class="p-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user->orders as $order)
                        <!-- Order Row -->
                        <tr class="border-t">
                            <td class="p-2">#{{ $order->id }}</td>
                            <td class="p-2 capitalize">{{ $order->status }}</td>
                            <td class="p-2">EGP{{ number_format($order->total_price, 2) }}</td>
                            <td class="p-2">{{ $order->street }}, {{ $order->city }}</td>
                            <td class="p-2 text-gray-500">{{ $order->created_at->diffForHumans()}}</td>
                            <td class="p-2">
                                <button wire:click="toggleOrderItems({{ $order->id }})"
                                        class="text-blue-600 hover:underline">
                                    {{ $showItemOrder === $order->id ? 'Hide' : 'View' }} Items
                                </button>
                            </td>
                        </tr>

                        <!-- Order Items Row -->
                        @if ($showItemOrder === $order->id)
                            <tr>
                                <td colspan="6" class="bg-gray-50 p-4">
                                    <div class="space-y-4">
                                        @foreach ($order->orderItems as $item)
                                            <div class="border p-3 rounded-md bg-white shadow-sm">
                                                <div class="font-medium">{{ $item->product_name }}</div>
                                                <div class="text-sm text-gray-600">{{ $item->product_desc }}</div>
                                                <div>Quantity: {{ $item->product_quantity }}</div>
                                                <div>Price: ${{ number_format($item->product_price, 2) }}</div>
                                                @if ($item->attributes)
                                                    <div class="text-sm mt-1">
                                                        Attributes:
                                                        @foreach ($item->attributes as $key => $value)
                                                            <span
                                                                    class="inline-block bg-gray-200 px-2 py-1 rounded text-xs">
                                                                    {{ $key }}: {{ $value }}
                                                                </span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <section class="blog about-blog footer-padding">
                <div class="container">
                    <div class="blog-item" data-aos="fade-up">
                        <div class="cart-img">
                            <img src="{{ asset('assets/website/assets/images/homepage-one/empty-wishlist.webp') }}"
                                 alt>
                        </div>
                        <div class="cart-content">
                            <p class="content-title">{{ __('website.no_products') }}</p>
                            <a href=""
                               class="shop-btn">{{ __('website.back_to_shop') }}</a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif
</div>