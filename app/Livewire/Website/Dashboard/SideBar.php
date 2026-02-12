<?php

namespace App\Livewire\Website\Dashboard;

use Livewire\Component;

class SideBar extends Component
{
    public $screen = 'dashboard';

    public function changeScreen($screen)
    {
        $this->screen = $screen;
        $this->dispatch('change-screen', $screen);
    }
    public function render()
    {
        return view('livewire.website.dashboard.side-bar');
    }
}
