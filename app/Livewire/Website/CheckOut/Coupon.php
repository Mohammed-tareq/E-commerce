<?php

namespace App\Livewire\Website\CheckOut;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Coupon as CouponModel;

class Coupon extends Component
{
    public $code;
    public $cart;
    public $couponDetails = '';
    public $cartItems = 0;

    public $listeners = ['update-cart'];

    public function mount()
    {
        $this->cart = auth()->user()->cart;
        $this->cart?->load('items');
        $this->cartItems = $this->cart?->loadCount('items')->items_count ?? 0;

        if ($this->cart->coupon) {
            $coupon = CouponModel::where('code',$this->cart->coupon)->first();
            $this->couponDetails = __('website.coupon_valid_for') . " " . $coupon->end_date . " " . __('website.discount_of') . " " . $coupon->discount_percentage . "%" ?? '';
        }

    }

    public function addCouponToCart()
    {
        if (!$code = $this->checkCouponIsValid($this->code)) {
            $this->dispatch('coupon_invalid', __('website.coupon_invalid'));
            return;
        }

        if (!$this->updateCartCoupon($code)) {
            return;
        }

        if (!$code = $this->updateCouponUsed($code)) {
            return;
        }

        $this->dispatch('coupon-added', __('website.coupon_added'));
        $this->couponDetails = __('website.coupon_valid_for') . " " . $code->end_date . " " . __('website.discount_of') . " " . $code->discount_percentage . "%";

    }

    protected function checkCouponIsValid($code)
    {
        $codeObj = CouponModel::where('code', $code)->first();
        if (!$codeObj) {
            $this->reset('code');
            return false;
        }

        if (!$codeObj->isValid()) {
            $this->reset('code');
            return false;
        }
        return $codeObj;
    }

    protected function updateCartCoupon($code)
    {
        $cartUpdate = auth()->user()->cart->update([
            'coupon' => $code->code
        ]);
        if (!$cartUpdate) {
            $this->dispatch('coupon_invalid', __('website.coupon_invalid'));
            return;
        }
    }

    protected function updateCouponUsed($code)
    {
        return $code->update([
            'used' => $code->used + 1
        ]);
    }

    public function render()
    {
        return view('livewire.website.check-out.coupon');
    }
}
