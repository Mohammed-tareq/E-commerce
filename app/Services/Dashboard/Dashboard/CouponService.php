<?php

namespace App\Services\Dashboard\Dashboard;

use App\Repositories\Dashboard\CouponRepository;
use Yajra\DataTables\DataTables;

class CouponService
{
    public function __construct(protected CouponRepository $couponRepository)
    {
    }

    public function getCoupons()
    {
        $coupons =  $this->couponRepository->getCoupons();
        return DataTables::of($coupons)
            ->addIndexColumn()
            ->addColumn('discount_percentage', function ($coupon) {
                return $coupon->discount_percentage . '%';
            })
            ->addColumn('action', function ($coupon) {
                return view('dashboard.coupons.action', compact('coupon'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getCoupon($id)
    {
        return $this->couponRepository->getCoupon($id) ?? abort(404);
    }

    public function createCoupon ($data)
    {
        return $this->couponRepository->createCoupon($data);
    }
    public function updateCoupon ($data , $id)
    {
        $coupon = $this->getCoupon($id);
        return $this->couponRepository->updateCoupon($coupon , $data);
    }

    public function deleteCoupon ($id)
    {
        $coupon = $this->getCoupon($id);
        self::updateCache();
        return $this->couponRepository->deleteCoupon($coupon);
    }

    public function changeStatus ($id)
    {
        $coupon = $this->getCoupon($id);
        return $this->couponRepository->changeStatus($coupon);
    }

    private function updateCache()
    {
        cache()->decrement('coupons_count');
    }
}