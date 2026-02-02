<?php

namespace App\Livewire\Website\Product;

use App\Models\ProductVariant;
use Livewire\Component;

class ProductShow extends Component
{
    public $product, $price , $qty ,$variantId , $variants=[];

    public $qtyAddedToCart = 1;

    public function mount($product)
    {
        $this->product = $product;
        $this->price = $this->product->isSimple()? $product->price : $product->variants->first()->price;
        $this->qty = $this->product->isSimple()? $product->qty : $product->variants->first()->qty;
        $this->variantId = $this->product->isSimple() ? null:$product->variants->first()->id;
        $this->variants = $this->product->variants ?? [];
    }

    public function selectVariant($variantId)
    {
        $variant = ProductVariant::find($variantId);
        if(!$variant){
            return false;
        }
        $this->changeAttributeForVariant($variant);
        $this->dispatch('change-variantId',$variantId);
        return true;
    }

    public function changeAttributeForVariant($variant)
    {
        $this->variantId = $variant->id;
        $this->price = $variant->price;
        $this->qty = $variant->qty;
    }

    public function render()
    {
       if($this->product->isSimple()){
           $this->variants = [];
       }

        return view('livewire.website.product.product-show',
            [
                'variants' => $this->variants
            ]);
    }
}
