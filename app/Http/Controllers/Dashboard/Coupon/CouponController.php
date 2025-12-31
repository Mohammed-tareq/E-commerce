<?php

namespace App\Http\Controllers\Dashboard\Coupon;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\CouponService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class CouponController extends Controller implements HasMiddleware
{
    public function __construct(protected CouponService $couponService){}

    public static function middleware()
    {
        return ['can:coupons'];
    }

    public function index()
    {
        //
    }

    public function getCoupons()
    {

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
