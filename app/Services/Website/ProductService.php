<?php

namespace App\Services\Website;

use App\Models\Product;

class ProductService
{

    public function getProduct($slug)
    {
        return Product::with(['brand', 'category', 'images'])
            ->active()
            ->where('slug', $slug)
            ->first();
    }

    public function getNewArrivals($limit = null)
    {
        return Product::with(['brand','category','images'])
            ->active()
            ->latest()
            ->select('id','name','slug','brand_id','category_id','price','has_variants','has_discount')
            ->paginate($limit);

    }

    public function getFlashProduct($limit = null)
    {
        return Product::with(['brand','category','images'])
            ->active()
            ->latest()
            ->where('has_discount', true)
            ->select('id','name','slug','brand_id','category_id','price','has_variants')
            ->paginate($limit);
    }
    public function getFlashProductTimer($limit = null)
    {
        return Product::with(['brand','category','images'])
            ->active()
            ->latest()
            ->where('available_for', date('Y-m-d'))
            ->whereNotNull('available_for')
            ->select('id','name','slug','brand_id','category_id','price','has_variants','has_discount')
            ->paginate($limit);
    }


}