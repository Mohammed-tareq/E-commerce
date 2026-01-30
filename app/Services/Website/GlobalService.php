<?php

namespace App\Services\Website;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class GlobalService
{
    public function __construct(protected ProductService $productService)
    {
    }

    public function getSliders()
    {
        return Slider::all();
    }

    public function getCategories($limit = null)
    {
        return Category::active()->latest()->when($limit, fn($query) => $query->limit($limit))->get();
    }

    public function getBrands($limit = null)
    {
        return Brand::active()->latest()->when($limit, fn($query) => $query->limit($limit))->get();
    }

    public function getProductsForCategory($slug)
    {
        $category = Category::active()->where('slug', $slug)->first()->id;
        return Product::with(['brand', 'category', 'images'])
            ->active()
            ->latest()
            ->select('id', 'name', 'slug', 'brand_id', 'category_id', 'price', 'has_discount', 'has_variants')
            ->where('category_id', $category)
            ->paginate(12);
    }

    public function getProductsForBrand($slug)
    {
        $brand = Brand::active()->where('slug', $slug)->first()->id;
        return Product::with(['brand', 'category', 'images'])
            ->active()
            ->latest()
            ->select('id', 'name', 'slug', 'brand_id', 'category_id', 'price', 'has_discount', 'has_variants')
            ->where('category_id', $brand)
            ->paginate(12);
    }


    public function getHomeProducts($limit = null): array
    {
        return [
            'newArrivals' => $this->productService->getNewArrivals($limit),
            'flashProductsTimer' => $this->productService->getFlashProductTimer($limit),
            'flashProductsWeek' => $this->productService->getFlashProductWeek($limit),
            'flashProducts' => $this->productService->getFlashProduct($limit)
        ];
    }



}