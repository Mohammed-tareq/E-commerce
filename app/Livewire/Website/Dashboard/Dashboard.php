<?php

namespace App\Livewire\Website\Dashboard;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Order;

class Dashboard extends Component
{
    public $screen = 'dashboard';
    public $user, $orderPaidCount, $orderDeliveredCount;

    public function mount($authUser , $orderPaidCount , $orderDeliveredCount)
    {
        $this->user = $authUser;
        $this->orderPaidCount = $orderPaidCount;
        $this->orderDeliveredCount =  $orderDeliveredCount;
    }

    #[On('change-screen')]
    public function changeScreen($screen)
    {
        $this->screen = $screen;
    }

    public function render()
    {
        return view('livewire.website.dashboard.dashboard', [
            'user' => $this->user,
            'orderPaidCount' => $this->orderPaidCount,
            'orderDeliveredCount' => $this->orderDeliveredCount,
        ]);
    }
}
