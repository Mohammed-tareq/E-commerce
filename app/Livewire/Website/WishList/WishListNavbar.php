<?php

namespace App\Livewire\Website\WishList;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListNavbar extends Component
{
    public $wishlistCount = 0;

    public $listeners = [
        'wishlist-changed' => '$refresh'
    ];

    public function render()
    {
        if (!Auth::check()) {
            $this->wishlistCount = 0;
        } else {
            $this->wishlistCount = auth('web')->user()->wishlists()->count();
        }
        return view('livewire.website.wish-list.wish-list-navbar', ['wishlistCount' => $this->wishlistCount]);
    }
}
