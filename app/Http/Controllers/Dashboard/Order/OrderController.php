<?php

namespace App\Http\Controllers\Dashboard\Order;

use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\OrderRepository;
use App\Services\Dashboard\OrderService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService)
    {
    }

    public function index()
    {
        return view('dashboard.order.index');
    }

    public function getorders(Request $request)
    {
        return $this->orderService->getAllOrderDataTable($request);
    }

    public function showOrder($id)
    {
        if (!$order = $this->orderService->getOrderWithItems($id)) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return view('dashboard.order.show', compact('order'));
    }

    public function deleteOrder($id)
    {
        if (!request()->expectsJson()) {
            if (!$this->orderService->deleteOrder($id)) {
                return redirect()->back()->with('error', __('dashboard.operation_error'));
            }
            return redirect()->route('dashboard.order.index')->with('success', __('dashboard.deleted'));
        }

        if (!$this->orderService->deleteOrder($id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 200);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.deleted')
        ], 200);
    }

    public function changeStatus($id)
    {
        if (!$this->orderService->changeOrderStatus($id)) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return redirect()->route('dashboard.order.index')->with('success', __('dashboard.updated'));
    }
}
