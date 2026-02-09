<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\OrderRepository;
use Yajra\DataTables\DataTables;

class OrderService
{
    public function __construct(protected OrderRepository $orderRepository)
    {
    }

    public function getAllOrderDataTable($request)
    {
        $orders = $this->orderRepository->getOrders();
        if ($request->filled('status') && $request->status !== 'all') {
            $orders = $orders->where('status', $request->status);
        }
        return DataTables::of($orders)
            ->addIndexColumn()
            ->addColumn('coupon', function ($order) {
                return $order->coupon ?? __('dashboard.no_coupon');
            })
            ->addColumn('coupon_discount', function ($order) {
                return $order->coupon_discount ?? __('dashboard.no_coupon');
            })
            ->addColumn('notes', function ($order) {
                return $order->notes ?? __('dashboard.no_notes');
            })
            ->addColumn('action', function ($order) {
                return view('dashboard.order.data-table.action', compact('order'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getOrderById($orderId)
    {
        return $this->orderRepository->getOrderById($orderId);
    }

    public function changeOrderStatus($id)
    {
        $order = $this->getOrderById($id);
        if(!$order){
            return false;
        }
        if($order->status !== 'completed'){
            dd($order);
            return false;
        }
        $this->orderRepository->changeStatus($order);
    }

    public function deleteOrder($id)
    {
        $order = $this->getOrderById($id);
        if (!$order) {
            return false;
        }
        if (!in_array($order->status, ['cancelled', 'delivered'])) {
            return false;
        }
        return $this->orderRepository->deleteOrder($order);
    }

    public function getOrderWithItems($id)
    {
        $order = $this->getOrderById($id);
        if(!$order){
            return false;
        }
        return $this->orderRepository->getOrderWithItems($order);
    }
}