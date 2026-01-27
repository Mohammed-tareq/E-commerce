<?php

namespace App\Livewire\Dashboard\Product;


use App\Services\Dashboard\Dashboard\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $categories, $brands, $attributesItem;
    public $successMessage = '';
    public $currentStep = 1;
    public $fullscreenImage = '';

    public $prices = [], $quantities = [], $attributeValues = [];

    public $addRowValues = 1;

    public $name_ar, $name_en, $images,
        $small_desc_ar, $small_desc_en,
        $desc_ar, $desc_en,
        $category_id, $brand_id,
        $sku, $available_for, $tags, $price, $qty, $discount, $discount_start, $discount_end;


    public $has_discount = 0, $manage_stock = 0, $has_variants = 0;


    protected $productService;

    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function mount($categories, $brands, $attributesItem)
    {
        $this->categories = $categories;
        $this->brands = $brands;
        $this->attributesItem = $attributesItem;
    }

    public function render()
    {
        return view('livewire.dashboard.product.create-product');
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
            'available_for' => 'required|date|after_or_equal:today',
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

    public function thirdStep()
    {
        $this->validate(
            [
                'images' => ['required', 'array'],
                'images.*' => ['required', 'image']
            ]
        );

        $this->currentStep++;
    }


    public function submitForm()
    {


        $product = [
            'name' => [
                'ar' => $this->name_ar,
                'en' => $this->name_en
            ],
            'small_desc' => [
                'ar' => $this->small_desc_ar,
                'en' => $this->small_desc_en
            ],
            'desc' => [
                'ar' => $this->desc_ar,
                'en' => $this->desc_en
            ],
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'sku' => $this->sku,
            'available_for' => $this->available_for,
            'has_variants' => $this->has_variants,
            'price' => $this->has_variants != 0 ? null : $this->price,
            'manage_stock' => $this->has_variants != 0 ? true : $this->manage_stock,
            'qty' => $this->has_variants != 0 ? null : $this->qty,
            'has_discount' => $this->has_discount,
            'discount' => $this->has_discount != 0 ? $this->discount : null,
            'discount_start' => $this->has_discount != 0 ? $this->discount_start : null,
            'discount_end' => $this->has_discount != 0 ? $this->discount_end : null,
        ];

        $productWithVariant = [];
        if ($this->has_variants == 1) {
            foreach ($this->prices as $index => $values) {
                $productWithVariant[] = [
                    'product_id' => null,
                    'price' => $values,
                    'qty' => $this->quantities[$index],
                    'attribute_values' => $this->attributeValues[$index]
                ];
            }
        }

        $this->productService->createProduct($product, $productWithVariant, $this->images);

        $this->resetExcept(['categories', 'brands', 'attributesItem']);
        $this->successMessage = __('dashboard.operation_success');
        $this->currentStep = 1;


    }


    public function addNewVariant()
    {
        $this->prices[] = [];
        $this->quantities[] = [];
        $this->attributeValues[] = [];
        $this->addRowValues = count($this->prices);
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

    public function deleteImage($key)
    {
        unset($this->images[$key]);
    }

    public function openFullscreen($key)
    {
        $this->fullscreenImage = $this->images[$key]->temporaryUrl();
        $this->dispatch('openFullScreenImage');
    }

    public function backStep()
    {
        $this->currentStep--;
    }
}
