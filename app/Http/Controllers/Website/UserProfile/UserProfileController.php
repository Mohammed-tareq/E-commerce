<?php

namespace App\Http\Controllers\Website\UserProfile;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $authUser = Auth::guard('web')->user()->load(['governorate','country','city']);
        $orderPaidCount = Order::where('user_id', $authUser->id)->where('status', 'paid')->count();
        $orderDeliveredCount = Order::where('user_id', $authUser->id)->where('status', 'delivered')->count();
        return view('website.user-profile.user-profile', compact('authUser', 'orderPaidCount', 'orderDeliveredCount'));
    }

}
