<?php

namespace App\Http\Controllers\Dashboard\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Coupon\CouponRequest;
use App\Services\Dashboard\Dashboard\CouponService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Arr;

class CouponController extends Controller implements HasMiddleware
{
    public function __construct(protected CouponService $couponService)
    {
    }

    public static function middleware()
    {
        return ['can:coupons'];
    }

    public function index()
    {
        return view('dashboard.coupons.index');
    }

    public function getCoupons()
    {
        return $this->couponService->getCoupons();
    }


    public function store(CouponRequest $request)
    {
        $data = Arr::only($request->validated(), [
            'code',
            'discount_percentage',
            'start_date',
            'end_date',
            'limiter',
            'status',
        ]);

        if (!$this->couponService->createCoupon($data)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ],500);
        }
        return response()->json(['status' => true, 'message' => __('dashboard.operation_success')],200);
    }



    public function update(CouponRequest $request, string $id)
    {
        $data = Arr::only($request->validated(), [
            'code',
            'discount_percentage',
            'start_date',
            'end_date',
            'limiter',
            'status',
        ]);

        if (!$this->couponService->updateCoupon($data, $id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ],500);
        }
        return response()->json(['status' => true, 'message' => __('dashboard.operation_success')],200);
    }


    public function destroy(string $id)
    {
        if (!$this->couponService->deleteCoupon($id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 500);
        }
        return response()->json(['status' => true, 'message' => __('dashboard.operation_success')], 200);
    }



    public function changeStatus(string $id)
    {
        if (!$this->couponService->changeStatus($id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 400);
        }
        return response()->json(['status' => true, 'message' => __('dashboard.operation_success')], 200);
    }
}
