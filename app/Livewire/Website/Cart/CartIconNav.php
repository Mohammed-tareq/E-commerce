<?php

namespace App\Livewire\Website\Cart;

use Livewire\Component;

class CartIconNav extends Component
{
    public $cartItemsCount;

    public function render()
    {
        if (!auth('web')->check())
            $this->cartItemsCount = 0;
        else
            $this->cartItemsCount = auth('web')->user()->cart()->with('items')->count();
        return view('livewire.website.cart.cart-icon-nav',['cartItemsCount'=>$this->cartItemsCount]);
    }
}
