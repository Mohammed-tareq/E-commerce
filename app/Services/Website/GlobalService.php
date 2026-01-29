<?php

namespace App\Services\Website;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;

class GlobalService
{
    public function getSliders()
    {
        return Slider::all();
    }
    public function getCategories($limit = null)
    {
        return Category::active()->latest()->when($limit, fn ($query) => $query->limit($limit))->get();
    }

    public function getBrands($limit = null)
    {
        return Brand::active()->latest()->when($limit, fn ($query) => $query->limit($limit))->get();
    }

}