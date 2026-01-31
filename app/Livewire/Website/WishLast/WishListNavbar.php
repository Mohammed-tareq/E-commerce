<?php

namespace App\Livewire\Website\WishLast;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListNavbar extends Component
{
    public $wishlistCount = 0;

    public $listeners = [
        'wishlist-changed'=> '$refresh'
    ];
    public function mount()
    {
        if(!Auth::check())
        {
            return;
        }
        $this->wishlistCount = auth('web')->user()->wishlists()->count();
    }
    public function render()
    {
        return view('livewire.website.wish-last.wish-list-navbar');
    }
}
