<?php

namespace App\Livewire\Website\Cart;

use App\Models\CartItem;
use Livewire\Attributes\On;
use Livewire\Component;

class CartIconNav extends Component
{
    public $cartItemsCount;
    public $cartItems;

    public $listeners = ['update-cart'];

    public function removeItemFromCart($itemId): void
    {
        CartItem::where('id', $itemId)->delete();
        $this->dispatch('update-cart');
    }

    public function render()
    {
        if (!auth('web')->check()) {
            $this->cartItemsCount = 0;
        } else {
            $this->cartItems = auth('web')->user()
                ->cart()
                ->withCount('items')
                ->with('items.product.images')
                ->first() ?? [];

            $this->cartItemsCount = $this->cartItems ? $this->cartItems['items_count'] : 0;
        }
        return view('livewire.website.cart.cart-icon-nav',
            ['cartItemsCount' => $this->cartItemsCount,
                'cartItems' => $this->cartItems
            ]);
    }
}
