<?php

namespace App\Livewire\Website\Dashboard;

use Livewire\Attributes\On;
use Livewire\Component;

class Order extends Component
{
    public $screen = 'dashboard';
    public $user;
    public $showItemOrder = null;


    public function mount($authUser)
    {
        $this->user = $authUser;
        $this->user->load('orders.orderItems');
    }

    public function toggleOrderItems($orderId)
    {
        $this->showItemOrder = $this->showItemOrder === $orderId ? null : $orderId;
    }

    #[On('change-screen')]
    public function changeScreen($screen)
    {
        $this->screen = $screen;
    }

    public function render()
    {
        return view('livewire.website.dashboard.order');
    }
}
