<?php

namespace App\Livewire\Website\WishList;

use App\Models\Wishlist;
use Livewire\Component;

class WishLastTable extends Component
{
    public $wishLists;
    public $listeners = [
        'wishlist-changed'=> '$refresh'
    ];


    public function removeWishList($productId)
    {
        $status = Wishlist::where('product_id',$productId)
            ->where('user_id',auth('web')->user()->id)
            ->delete();
        if(!$status)
        {
            $this->dispatch('not-found',__('website.not_found'));
        }
        $this->dispatch('wishlist-changed',__('website.remove_from_wishlist'));

    }

    public function cleanWishList()
    {
        $status = auth('web')->user()->wishlists()->delete();
        if(!$status)
        {
            $this->dispatch('not-found',__('website.not_found'));
        }
        $this->dispatch('wishlist-changed',__('website.clean_wishlist'));
    }
    public function render()
    {
        $this->wishLists = auth('web')->user()->wishlists;
        return view('livewire.website.wish-list.wish-list-table',['wishLists' => $this->wishLists]);
    }
}
