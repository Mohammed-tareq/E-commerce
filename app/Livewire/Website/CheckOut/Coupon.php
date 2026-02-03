<?php

namespace App\Livewire\Website\CheckOut;

use Livewire\Attributes\On;
use Livewire\Component;

class Coupon extends Component
{
    public $couponCodesStatus = false;

    #[On('coupon-changed')]
    public function couponChanged($showCoupon)
    {
        $this->couponCodesStatus = $showCoupon;
    }

    public function render()
    {
        return view('livewire.website.check-out.coupon');
    }
}
