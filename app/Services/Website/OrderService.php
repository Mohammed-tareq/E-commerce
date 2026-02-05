<?php

namespace App\Services\Website;

use App\Models\Country;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\ShippingPrice;

class OrderService
{

    public function addItemsInOrder($orderData)
    {
        $country = $this->getAddress(Country::class, $orderData['country_id']);
        $governorate = $this->getAddress(Country::class, $orderData['governorate_id']);
        $city = $this->getAddress(Country::class, $orderData['city_id']);
        if (!$country || !$governorate || $city) {
            return false;
        }

        $cart = $this->getCartUser();
        if (!$cart || !$cart->items()->exists()) {
            return false;
        }

        $subtotal = $cart->items->sum('total_price');
        $shippingPrice = $this->getShippingPrice($orderData['governorate_id']);
        if ($cart->coupon !== null) {
            $coupon = Coupon::valid()->where('code', $cart->coupon)->first();
            if ($coupon) {
                $couponDiscount = $coupon->discount_percentage;
                $subtotal -=  ($subtotal * $couponDiscount / 100);
            }
        }
        $total = $subtotal + $shippingPrice;
        $order = $this->createOrder($orderData, $subtotal, $shippingPrice, $total, $coupon?->code);
        if (!$order) {
            return false;
        }

        $orderItems =   $this->createOrderItems($order, $cart);
        if (!$orderItems) {
            return false;
        }
        return true;
    }

    private function getAddress($model, $id)
    {
        return $model->find($id);
    }

    private function getCartUser()
    {
        return auth('web')->user()->cart?->load('items.product');
    }

    private function getShippingPrice($governorateId)
    {
        return ShippingPrice::where('governorate_id', $governorateId)->first()?->price ?? 0;
    }

    private function createOrder($orderData, $subtotal, $shippingPrice, $total, $coupon = null)
    {
        return Order::create([
            'user_id' => auth('web')->user()->id,
            'first_name' => $orderData['first_name'],
            'last_name' => $orderData['last_name'],
            'user_phone' => $orderData['user_phone'],
            'user_email' => $orderData['user_email'],
            'country' => $orderData['country_id'],
            'governorate' => $orderData['governorate_id'],
            'city' => $orderData['city_id'],
            'street' => $orderData['street'],
            'notes' => $orderData['notes'],
            'price' => $subtotal,
            'shipping_price' => $shippingPrice,
            'total_price' => $total,
            'coupon' => $coupon?->code ?? null,
            'coupon_discount' => $coupon !== null ? $coupon?->discount_percentage : null,
        ]);
    }
    private function createOrderItems($order, $cart)
    {
        foreach ($cart->items as $item) {
            $orderItem = $order->orderItems()->create([
                'product_id' => $item->product_id,
                'product_variant_id' => $item->product_variant_id,
                'product_name' => $item->product->name ?? 'No Name',
                'product_quantity' => $item->quantity ?? 0,
                'product_price' => $item->price,
                'total_price' => $item->total_price,
                'attributes' => $item->attributes ?? null,

            ]);
            if (!$orderItem) {
                return false;
            }
        }
        return true;
    }
}
