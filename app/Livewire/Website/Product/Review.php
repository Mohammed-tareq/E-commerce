<?php

namespace App\Livewire\Website\Product;

use Livewire\Component;

class Review extends Component
{
    public $product;
    public $comment;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function submitReview()
    {
        $this->validate([
            'comment' => ['required', 'min:3', 'max:1000', 'string']
        ]);

        $this->product->reviews()->create([
            'user_id' => auth('web')->user()->id,
            'comment' => $this->comment
        ]);

        $this->reset('comment');
        $this->product->load('reviews');
        $this->dispatch('review-add', __('website.review-add'));
    }

    public function render()
    {
        return view('livewire.website.product.review');
    }
}
