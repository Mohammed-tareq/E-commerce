<?php

namespace App\Livewire\Website\Product;

use Livewire\Attributes\On;
use Livewire\Component;

class ProductDiscountPercentage extends Component
{
    public $product;
    public $discount;
    public $variantId;

    public function mount($product)
    {
        $this->product = $product;
        $this->variantId = $product->variants->first()->id??null;
    }

    #[On('change-variantId')]
    public function changeVariantId($variantId)
    {
        $this->variantId = $variantId;
    }

    public function getDiscountPercentage()
    {
        if ($this->product->variants()->exists() && $this->product->has_discount) {
            foreach ($this->product->variants as $variant) {
                if ($variant->id === $this->variantId) {
                    $this->discount = round(($this->product->discount / $variant->price)*100, 2);
                }
            }
            return $this->discount;
        }

        $this->discount = round(($this->product->discount / $this->product->price)*100,2);
        return $this->discount;

    }

    public function render()
    {
        $this->getDiscountPercentage();
        return view('livewire.website.product.product-discount-percentage');
    }
}
