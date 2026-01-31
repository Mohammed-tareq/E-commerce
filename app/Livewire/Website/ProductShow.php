<?php

namespace App\Livewire\Website;

use App\Models\ProductVariant;
use Livewire\Component;

class ProductShow extends Component
{
    public $product, $price , $qty ,$variantId , $variants=[];


    public function mount($product)
    {
        $this->product = $product;
        $this->price = $this->product->isSimple()? $product->price : $product->variants->first()->price;
        $this->qty = $this->product->isSimple()? $product->qty : $product->variants->first()->qty;
        $this->variantId = $this->product->isSimple() ? null:$product->variants->first()->id;
        $this->variants = $this->product->variants ?? [];
    }

    public function secletVarint($variantId)
    {
        $variant = ProductVariant::find($variantId);
        if(!$variant){
            return false;
        }
        $this->changeAttributeForVariant($variant);
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

        return view('livewire.website.product-show',
            [
                'variants' => $this->variants
            ]);
    }
}
