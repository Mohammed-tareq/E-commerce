<?php

namespace App\Services\Website;

use App\Models\Country;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\ShippingPrice;
use App\Models\Transaction;

class OrderService
{


    public function calcInvoicePrice($governorateId)
    {
        $shippingPrice = $this->getShippingPrice($governorateId);

        $cart = $this->getCartUser();
        if (!$cart || !$cart->items()->exists()) {
            return null;
        }
        $subtotal = $cart->items->sum('total_price');
        if ($cart->coupon !== null) {
            $coupon = Coupon::valid()->where('code', $cart->coupon)->first();
            if ($coupon) {
                $subtotal -= ($subtotal * $coupon->discount_percentage / 100);
            }
        }
        $totalPrice = $subtotal + $shippingPrice;
        return $totalPrice;
    }

    public function addItemsInOrder($orderData)
    {
        $country = $this->getAddress(Country::class, $orderData['country_id']);
        $governorate = $this->getAddress(Country::class, $orderData['governorate_id']);
        $city = $this->getAddress(Country::class, $orderData['city_id']);
        if (!$country || !$governorate || !$city) {
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
                $subtotal -= ($subtotal * $couponDiscount / 100);
            }
        }
        $totalPrice = $subtotal + $shippingPrice;

        $order = $this->createOrder($orderData, $subtotal, $shippingPrice, $totalPrice, $country, $governorate, $city, $coupon);

        if (!$order) {
            return false;
        }

        $orderItems = $this->createOrderItems($order, $cart);
        if (!$orderItems) {
            return false;
        }
        return $order;
    }

    public function createTransaction($orderId, $invoiceId, string $paymentType)
    {
        $transaction = Transaction::create([
            'order_id' => $orderId,
            'user_id' => auth('web')->user()->id,
            'invoice_id' => $invoiceId,
            'payment_method' => $paymentType,
        ]);
        if (!$transaction) {
            return false;
        }
        return $transaction;

    }

    private function getAddress($model, $id)
    {
        return $model::find($id)?->name;
    }

    private function getCartUser()
    {
        return auth('web')->user()->cart?->load('items.product');
    }

    private function getShippingPrice($governorateId)
    {
        return ShippingPrice::where('governorate_id', $governorateId)->first()?->price ?? 0;
    }

    private function createOrder($orderData, $subtotal, $shippingPrice, $totalPrice, $country, $governorate, $city, $coupon)
    {
        return Order::create([
            'user_id' => auth('web')->user()->id,

            'first_name' => $orderData['first_name'],
            'last_name' => $orderData['last_name'],
            'user_phone' => $orderData['user_phone'],
            'user_email' => $orderData['user_email'],
            'country' => $country,
            'governorate' => $governorate,
            'city' => $city,
            'street' => $orderData['street'],
            'notes' => $orderData['notes'],
            'price' => $subtotal,
            'shipping_price' => $shippingPrice,
            'total_price' => $totalPrice,
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
                'product_desc' => $item->product->small_desc ?? 'No Description',
                'product_quantity' => $item->quantity ?? 0,
                'product_price' => $item->price,
                'product_discount' => $item->product->has_discount ? $item->product->discount : null,
                'total_price' => $item->total_price,
                'attributes' => $item->attributes ?? null,

            ]);
            if (!$orderItem) {
                return false;
            }
        }
        return true;
    }

    public function clearCart()
    {
        auth('web')->user()->cart->items()->delete();
    }

    public function changeOrderStatus($transactionId, $status)
    {
        $transaction = Transaction::where('invoice_id', $transactionId)->first();
        if (!$transaction) {
            return false;
        }
        return $transaction->order->update(['status' => $status]);

    }
}
