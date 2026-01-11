<?php

namespace App\Livewire\Dashboard\Product;

use App\Services\Dashboard\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product, $categories, $brands, $attributesItem = [];

    public $currentStep = 1;

    public $name_ar, $name_en, $images,
        $small_desc_ar, $small_desc_en,
        $desc_ar, $desc_en,
        $category_id, $brand_id,
        $sku, $available_for, $tags, $price, $qty, $discount, $discount_start, $discount_end;
    public $prices = [], $quantities = [], $attributeValues = [];
    public $has_discount, $manage_stock, $has_variants;
    public $newImages = [];
    public $fullscreenImage = '';

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

        // first step
        $this->name_ar = $this->product->getTranslation('name', 'ar');
        $this->name_en = $this->product->getTranslation('name', 'en');
        $this->small_desc_ar = $this->product->getTranslation('small_desc', 'ar');
        $this->small_desc_en = $this->product->getTranslation('small_desc', 'en');
        $this->desc_ar = $this->product->getTranslation('desc', 'ar');
        $this->desc_en = $this->product->getTranslation('desc', 'en');
        $this->available_for = $this->product->available_for;
        $this->sku = $this->product->sku;
        $this->category_id = $this->product->category->id;
        $this->brand_id = $this->product->brand->id;

        // second step
        $this->has_variants = $this->product->has_variants;
        $this->has_discount = $this->product->has_discount;
        $this->discount = $this->product->discount;
        $this->discount_start = $this->product->discount_start;
        $this->discount_end = $this->product->discount_end;
        $this->manage_stock = $this->product->manage_stock;
        $this->qty = $this->product->qty;


        $this->addRowValues = count($this->product->variants);
        foreach ($this->product->variants as $index => $variant) {
            $this->prices[$index] = $variant->price;
            $this->quantities[$index] = $variant->qty;

            foreach ($variant->variantAttributes as $variantAttribute) {
                $this->attributeValues[$index][$variantAttribute->attributeValue->attribute_id] = $variantAttribute->attribute_value_id;
            }
        }

        // third step

        $this->images = $this->product->images;
    }

    public function fristStep()
    {
        $this->validate([
            'name_ar' => 'required|string|min:3|max:100',
            'name_en' => 'required|string|min:3|max:100',
            'small_desc_ar' => 'required|string|min:5|max:255',
            'small_desc_en' => 'required|string|min:5|max:255',
            'desc_ar' => 'required|string|min:10|max:5000',
            'desc_en' => 'required|string|min:10|max:5000',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'sku' => 'required|string|max:255',
            'available_for' => 'required|date',
        ]);


        $this->currentStep++;
    }

    public function secondStep()
    {
        $data = [
            'has_variants' => 'required|in:0,1',
            'has_discount' => 'required|in:0,1',
            'manage_stock' => 'required|in:0,1'
        ];
        if ($this->has_variants == 0) {
            $data['price'] = 'required|integer|min:0|max:1000000';
        }
        if ($this->manage_stock == 1) {
            $data['qty'] = 'required|integer|min:0|max:1000000';
        }
        if ($this->has_discount == 1) {
            $data['discount'] = 'required|integer|min:0|max:100';
            $data['discount_start'] = 'required|date|after_or_equal:today';
            $data['discount_end'] = 'required|date|after_or_equal:discount_start';
        }

        if ($this->has_variants == 1) {
            $data['prices'] = ['required', 'array'];
            $data['prices.*'] = ['required', 'numeric', 'min:1', 'max:100000'];
            $data['quantities'] = ['required', 'array'];
            $data['quantities.*'] = ['required', 'integer', 'min:1', 'max:100000'];
            $data['attributeValues'] = ['required', 'array', 'min:1'];
            $data['attributeValues.*'] = ['required', 'array'];
            $data['attributeValues.*.*'] = ['required', 'integer', 'exists:attribute_values,id'];
        }
        $this->validate($data);

        $this->currentStep++;

    }


    public function addNewVariant()
    {
        $this->addRowValues++;
    }

    public function removeVariant()
    {
        if ($this->addRowValues > 1) {
            $this->addRowValues--;
            array_pop($this->prices);
            array_pop($this->quantities);
            array_pop($this->attributeValues);
        }
    }

    public function deleteImage($id, $imageId = null, $imageFile = null)
    {
        if ($id) {
            unset($this->newImages[$id]);
        }
        if (!empty($imageId) && !empty($imageFile)) {
            $this->productService->deleteProductImage($imageId, $imageFile);
        }
        $this->images = $this->product->images;

    }

    public function openFullscreen($key)
    {
        if ($key) {
            $this->fullscreenImage = $this->newImages[$key]->temporaryUrl();
            $this->dispatch('openFullScreenImage');
        }
    }

    public function backStep()
    {
        $this->currentStep--;
    }

    public function render()
    {
        return view('livewire.dashboard.product.edit-product');
    }
}
