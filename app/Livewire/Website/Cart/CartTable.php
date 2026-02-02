<?php

namespace App\Livewire\Website\Cart;

use App\Models\CartItem;
use Livewire\Attributes\On;
use Livewire\Component;

class CartTable extends Component
{

    public function incrementQty($itemId): void
    {
        $item = CartItem::find($itemId);
        $item->update([
            'quantity' => $item->quantity + 1 ,
            'total_price' => $item->price * ($item->quantity + 1)
           ]);
        $this->dispatch('update-cart');
    }
    public function decrementQty($itemId): void
    {
        $item = CartItem::find($itemId);
        if($item->quantity > 1){
           $item->update([
            'quantity' =>$item->quantity - 1,
            'total_price' => $item->price * ($item->quantity - 1)
           ]);
            $this->dispatch('update-cart');
        }
    }

    public function removeItem($itemId): void
    {
        CartItem::where('id', $itemId)->delete();
        $this->dispatch('update-cart');
    }

    public function cleanCart(): void
    {
        auth('web')->user()->cart->items()->delete();
        $this->dispatch('update-cart');
    }

    #[On('update-cart')]
    public function render()
    {
        $cartItems = auth('web')->user()
            ->cart()
            ->with('items.product.images')
            ->first() ?? [];
        return view('livewire.website.cart.cart-table', ['cartItems' => $cartItems]);
    }
}
