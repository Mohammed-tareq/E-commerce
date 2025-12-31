<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CouponRepository;

class CouponService
{
    public function __construct(protected CouponRepository $couponRepository)
    {
    }


    private function updateCache()
    {
        cache()->forget('coupons_count');
    }
}