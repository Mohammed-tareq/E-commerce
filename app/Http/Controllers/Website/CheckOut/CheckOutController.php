<?php

namespace App\Http\Controllers\Website\CheckOut;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Checkout\CheckOutRequest;
use App\Models\Transaction;
use App\Services\Website\MyfatoorahService;
use App\Services\Website\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function __construct(protected OrderService $orderService, protected MyfatoorahService $myfatoorahService)
    {

    }

    public function index()
    {
        return view('website.pages.check-out');
    }

    public function checkout(CheckOutRequest $request, $userId)
    {
        $orderDataUser = $request->validated();
        $orderDataUser['user_id'] = $userId;

        $totalPrice = $this->orderService->calcInvoicePrice($orderDataUser['governorate_id']);
        if ($totalPrice === null || $totalPrice <= 0) {
            return redirect()->back()->with('error', __('website.error_in_order'));
        }

        $data = [
            'InvoiceValue' => $totalPrice,
            'CustomerName' => "{$orderDataUser['first_name']} {$orderDataUser['last_name']}",
            'NotificationOption' => 'LNK',
            'DisplayCurrencyIso' => 'EGP',
            'MobileCountryCode' => '+20',
            'CustomerMobile' => $orderDataUser['user_phone'],
            'CustomerEmail' => $orderDataUser['user_email'],
            'CallBackUrl' => route('website.checkout.callback'),
            'ErrorUrl' => route('website.checkout.errorCallBack'),
        ];

        $invoice = $this->myfatoorahService->createInvoice($data);
        if (!$invoice || !$url = $invoice['Data']['InvoiceURL']) {
            return redirect()->route('website.checkout.index')->with('error', __('website.error_in_order'));
        }


        if (!$order = $this->orderService->addItemsInOrder($orderDataUser)) {
            return redirect()->route('website.checkout.index')->with('error', __('website.error_in_order'));
        }

        if (!$this->orderService->createTransaction($order->id, $invoice['Data']['InvoiceId'], 'myfatoorah')) {
            return redirect()->route('website.checkout.index')->with('error', __('website.error_in_order'));
        }

        return redirect($url);
    }


    public function callback(Request $request)
    {
        $data = [];
        $data['Key'] = $request->paymentId;
        $data['KeyType'] = 'PaymentId';

        $invoice = $this->myfatoorahService->checkInvoice($data);

        if ($invoice['Data']['InvoiceStatus'] !== 'Paid') {
            $this->orderService->changeOrderStatus($invoice['Data']['InvoiceId'], 'cancelled');
            return redirect()->route('website.checkout.index')->with('error', __('website.error_in_order'));
        }

        $this->orderService->changeOrderStatus($invoice['Data']['InvoiceId'], 'completed');
        return redirect()->route('website.checkout.index')->with('success', __('website.success_in_order'));
    }

    public function errorCallBack(Request $request)
    {
        $data = [];
        $data['Key'] = $request->paymentId;
        $data['KeyType'] = 'PaymentId';

        $invoice = $this->myfatoorahService->checkInvoice($data);
        if ($invoice['Data']['InvoiceStatus'] !== 'Paid') {
            $this->orderService->changeOrderStatus($invoice['Data']['InvoiceId'], 'cancelled');
        }
        return redirect()->route('website.checkout.index')->with('error', __('website.error_in_order'));
    }


}
