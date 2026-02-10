<?php

namespace App\Repositories\Dashboard;

use App\Models\Order;

class OrderRepository
{

    public function getOrders()
    {
        return Order::query()->latest();
    }

    public function getOrderById($id)
    {
        return Order::query()->find($id);
    }

    public function changeStatus($order)
    {
        return $order->update([
            'status' => 'delivered'
        ]);
    }

    public function deleteOrder($order)
    {
        return $order->delete();
    }

    public function getOrderWithItems($order)
    {
        return $order->load('orderItems');
    }
}