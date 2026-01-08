<?php

namespace App\Livewire\Dashboard\Product;

use App\Services\Dashboard\ProductService;
use Livewire\Component;

class EditProduct extends Component
{
    public $product, $categories, $brands, $attributesItem = [];

    public $currentStep = 1;

    public $name_ar, $name_en, $images,
        $small_desc_ar, $small_desc_en,
        $desc_ar, $desc_en,
        $category_id, $brand_id,
        $sku, $available_for, $tags, $price, $qty, $discount, $discount_start, $discount_end;
    public $prices = [] , $quantities = [] , $attributeValues = [];
    public $has_discount, $manage_stock, $has_variants;
    public $successMessage = '';
    public $addRowValues = 0;
    protected ProductService $productService;

    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function mount($productId, $categories, $brands, $attributesItem)
    {
        $this->product = $this->productService->getProductEagerLoad($productId);
        $this->categories = $categories;
        $this->brands = $brands;
        $this->attributesItem = $attributesItem;

        $this->name_ar = $this->product->getTranslation('name', 'ar');
        $this->name_en = $this->product->getTranslation('name', 'en');
        $this->small_desc_ar = $this->product->getTranslation('small_desc', 'ar');
        $this->small_desc_en = $this->product->getTranslation('small_desc', 'en');
        $this->desc_ar = $this->product->getTranslation('desc', 'ar');
        $this->desc_en = $this->product->getTranslation('desc', 'en');
        $this->available_for = $this->product->available_for;
        $this->sku = $this->product->sku;

        $this->has_variants = $this->product->has_variants;


        $this->has_discount = $this->product->has_discount;
        $this->discount = $this->product->discount;
        $this->discount_start = $this->product->discount_start;
        $this->discount_end = $this->product->discount_end;


        $this->manage_stock = $this->product->manage_stock;
        $this->qty = $this->product->qty;

        $this->category_id = $this->product->category->id;
        $this->brand_id = $this->product->brand->id;



        foreach ($this->product->variants as $index => $variant){
            $this->prices[$index] = $variant->price;
            $this->quantities[$index] = $variant->qty;
            $this->attributeValues[$index] = $variant->attributeValues;
        }
    }


    public function fristStep()
    {
        $this->currentStep ++;
    }

    public function render()
    {
        return view('livewire.dashboard.product.edit-product');
    }
}
