<?php

namespace App\Repositories\Dashboard;

use App\Models\Coupon;

class CouponRepository
{

    public function getCoupons()
    {
        return Coupon::select('id','code','discount_percentage','start_date','end_date','limiter','used','status','created_at')->latest()->get();
    }
    public function getCoupon($id)
    {
        return Coupon::find($id);
    }

    public function createCoupon($data)
    {
        return Coupon::create($data);
    }

    public function updateCoupon($coupon, $data)
    {
        return $coupon->update($data);
    }

    public function deleteCoupon($coupon)
    {
        return $coupon->delete();
    }

    public function changeStatus($coupon)
    {
        return $coupon->update(['status' => !$coupon->getRawOriginal('status')]);
    }
}