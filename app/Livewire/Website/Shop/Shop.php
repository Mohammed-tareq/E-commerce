<?php

namespace App\Livewire\Website\Shop;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public $categories, $brands;
    public array $categoriesId = [];
    public array $brandsId = [];
    public $minPrice = 0 , $maxPrice = 6000;

    public function mount()
    {
        $this->categories = Category::active()->get();
        $this->brands = Brand::active()->get();
    }

    #[On('priceUpdated')]
    public function updatePrice($min, $max)
    {
        $this->minPrice = (int)$min;
        $this->maxPrice = (int)$max;
    }

    public function FilterProducts()
    {
        return Product::with(['brand', 'category', 'images', 'variants'])
            ->when(!empty($this->categoriesId), fn($q) => $q->whereIn('category_id', $this->categoriesId))
            ->when(!empty($this->brandsId), fn($q) => $q->whereIn('brand_id', $this->brandsId))
            ->where(function ($query) {
                $query->whereDoesntHave('variants')
                    ->where(function ($q) {
                        $q->where('has_discount', 0)
                            ->whereBetween('price', [$this->minPrice, $this->maxPrice])
                            ->orWhere('has_discount', 1)
                            ->whereRaw('(price - discount) BETWEEN ? AND ?',
                                [$this->minPrice, $this->maxPrice]);
                    });
                $query->orWhereHas('variants', function ($q) {
                    $q->where(function ($q) {
                        $q->where('products.has_discount', 0)
                            ->whereRaw('product_variants.price BETWEEN ? AND ?', [$this->minPrice, $this->maxPrice])
                            ->orWhere(function ($q) {
                                $q->where('products.has_discount', 1)
                                    ->whereRaw('(product_variants.price - products.discount) BETWEEN ? AND ?', [$this->minPrice, $this->maxPrice]);
                            });
                    });
                });
            })->paginate(16);
    }

    public function render()
    {
        return view('livewire.website.shop.shop', [
            'products' => $this->FilterProducts()
        ]);
    }
}
