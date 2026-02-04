<?php

namespace App\Livewire\Website\CheckOut;

use Livewire\Attributes\On;
use Livewire\Component;

class OrderSummary extends Component
{
    public $listeners = ['update-cart'];
    public $shippingPrice = 0;
    public $showCoupon = false;

    #[On('shipping-price')]
    public function updateShippingPrice($price)
    {
        $this->shippingPrice = $price;
    }


    public function render()
    {
        $cartItems = auth('web')->user()->cart?->load('items.product');
        return view('livewire.website.check-out.order-summary', compact('cartItems'));
    }
}
