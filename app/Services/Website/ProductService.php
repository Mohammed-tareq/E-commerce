<?php

namespace App\Services\Website;

use App\Models\Product;

class ProductService
{

    public function getProduct($slug)
    {
        return Product::with(['brand', 'category', 'images', 'reviews'])
            ->active()
            ->where('slug', $slug)
            ->first();
    }

    public function getRelatedProductBySlug($slug, $limit = null)
    {
        $categoryId = Product::whereSlug($slug)->first()->category_id;
        $products = Product::query()->with(['category', 'brand', 'images'])
            ->active()
            ->whereCategoryId($categoryId)
            ->latest();
        if ($limit) {
            $products->paginate($limit);
        }

        return $products->paginate(30);
    }

    public function getNewArrivals($limit = null)
    {
        $products = Product::query()->with(['brand', 'category', 'images'])
            ->active()
            ->latest()
            ->select('id', 'name', 'slug', 'brand_id', 'category_id', 'price', 'has_variants', 'has_discount');
        if ($limit) {
            return $products->paginate($limit);
        }
        return $products->get();
    }

    public function getFlashProduct($limit = null)
    {
        $products = Product::query()->with(['brand', 'category', 'images'])
            ->active()
            ->latest()
            ->where('has_discount', true)
            ->select('id', 'name', 'slug', 'brand_id', 'category_id', 'price', 'has_variants');
        if ($limit) {
            return $products->paginate($limit);
        }
        return $products->get();
    }

    public function getFlashProductTimer($limit = null)
    {
        $products = Product::query()->with(['brand', 'category', 'images'])
            ->active()
            ->latest()
            ->where('available_for', today())
            ->whereNotNull('available_for')
            ->where('has_discount', true)
            ->select('id', 'name', 'slug', 'brand_id', 'category_id', 'price', 'has_variants', 'has_discount');
        if ($limit) {
            return $products->paginate($limit);
        }
        return $products->get();
    }

    public function getFlashProductWeek($limit = null)
    {
        $products = Product::query()->with(['brand', 'category', 'images'])
            ->active()
            ->latest()
            ->whereBetween('available_for', [today()->addDay(), today()->addWeek()])
            ->whereNotNull('available_for')
            ->where('has_discount', true)
            ->select('id', 'name', 'slug', 'brand_id', 'category_id', 'price', 'has_variants', 'has_discount');
        if ($limit) {
            return $products->paginate($limit);
        }
        return $products->get();
    }


}