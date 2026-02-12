<?php

namespace App\Livewire\Website\Dashboard;

use Livewire\Attributes\On;
use Livewire\Component;

class Wishlist extends Component
{
    public $screen = 'dashboard';

    #[On('change-screen')]
    public function changeScreen($screen)
    {
        $this->screen = $screen;
    }
    public function render()
    {
        return view('livewire.website.dashboard.wishlist');
    }
}
