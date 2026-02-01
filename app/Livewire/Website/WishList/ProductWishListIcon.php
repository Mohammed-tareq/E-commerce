<?php

namespace App\Livewire\Website\WishList;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductWishListIcon extends Component
{
    public $clicked = false;
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
        if (!Auth::check()) {
            return;
        }
        $wishList = Wishlist::where('user_id', auth('web')->user()->id)
            ->where('product_id', $this->productId)
            ->first();

        if ($wishList) {
            $this->clicked = true;
        }
    }

    public function addWishList($productId)
    {
        if (!Auth::check()) {
            return redirect()->route('website.login');
        }
        Wishlist::create([
            'user_id' => auth('web')->user()->id,
            'product_id' => $productId,
        ]);

        $this->clicked = true;
        $this->dispatch('wishlist-changed', __('website.added_to_wishlist'));

    }

    public function removeWishList($productId)
    {
        if (!Auth::check()) {
            return redirect()->route('website.login');
        }
        Wishlist::where('user_id', auth('web')->user()->id)
            ->where('product_id', $productId)
            ->delete();

        $this->clicked = false;
        $this->dispatch('wishlist-changed', __('website.remove_from_wishlist'));

    }

    public function render()
    {
        return view('livewire.website.wish-list.product-wish-list-icon');
    }
}
