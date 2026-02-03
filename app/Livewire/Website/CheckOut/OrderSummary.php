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

    public function changeShowCouponStatus()
    {
        $this->showCoupon = !$this->showCoupon;
        $this->dispatch('coupon-changed',$this->showCoupon);
    }

    public function render()
    {
        $cartItems = auth('web')->user()->cart()->with('items.product')->first();
        return view('livewire.website.check-out.order-summary', compact('cartItems'));
    }
}
