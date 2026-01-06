<?php

namespace App\Livewire\Dashboard\Product;


use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Utils\ImageManagement;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $categories = [], $brands = [];
    public $successMessage = '';
    public $currentStep = 1;
    public $fullscreenImage = '';

    public $name_ar, $name_en, $images,
        $small_desc_ar, $small_desc_en,
        $desc_ar, $desc_en,
        $category_id, $brand_id,
        $sku, $available_for, $tags, $price, $qty, $discount, $start_discount, $end_discount;


    public $has_discount = 0, $manage_stock = 0, $has_variants = 0;

    public function render()
    {
        return view('livewire.dashboard.product.create-product');
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
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
            'tags' => 'required|string|max:255',
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
            $data['price'] = 'required|numeric|min:0|max:1000000';
        }
        if ($this->manage_stock == 1) {
            $data['qty'] = 'required|integer|min:0|max:1000000';
        }
        if ($this->has_discount == 1) {
            $data['discount'] = 'required|numeric|min:0|max:100';
            $data['start_discount'] = 'required|date|after_or_equal:today';
            $data['end_discount'] = 'required|date|after_or_equal:start_discount';
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
        $product = Product::create([
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
            'category_id'   => $this->category_id,
            'brand_id'      => $this->brand_id,
            'sku'           => $this->sku,
            'available_for' => $this->available_for,
            'has_variants'  => $this->has_variants,
            'price'         => $this->has_variants != 0 ? null : $this->price,
            'manage_stock'  => $this->has_variants != 0 ? null : $this->manage_stock,
            'qty'           => $this->has_variants != 0 ? null : $this->qty,
            'has_discount'  => $this->has_discount,
            'discount'      => $this->has_discount != 0 ? $this->discount : null,
            'start_discount' => $this->has_discount != 0 ? $this->start_discount : null,
            'end_discount'  => $this->has_discount != 0 ? $this->end_discount : null,
        ]);

        $productImages = new ImageManagement();
        $productImages->UploadImages($this->images,$product,'products');
        $this->reset();
        $this->successMessage = __('dashboard.operation_success');

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
