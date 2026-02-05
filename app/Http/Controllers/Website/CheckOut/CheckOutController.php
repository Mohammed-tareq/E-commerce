<?php

namespace App\Http\Controllers\Website\CheckOut;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Checkout\CheckOutRequest;
use App\Services\Website\OrderService;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function __construct(protected OrderService $orderService)
    {

    }
    public function index()
    {
        return view('website.pages.check-out');
    }

    public function checkout(CheckOutRequest $request)
    {
        $orderDataUser = $request->validated();
        if(!$this->orderService->addItemsInOrder($orderDataUser)){
            return redirect()->back()->with('error',__('website.error_in_order'));
        }
        return redirect()->back()->with('success',__('website.your_order_added'));


    }
}
