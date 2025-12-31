<?php

namespace App\Repositories\Dashboard;

use App\Models\Brand;

class BrandRepository
{

    public function getBrands()
    {
        return Brand::withCount('products')->select('id','name' , 'image', 'status' ,'created_at')->latest()->get();
    }

    public function getBrand($id)
    {
        return Brand::find($id);
    }

    public function storeBrand($data)
    {
        return Brand::create($data);
    }

    public function updateBrand($data , $brand)
    {
        return $brand->update($data);
    }

    public function deleteBrand($brand)
    {
        return $brand->delete();
    }

    public function changeStatus($brand)
    {
        return $brand->update(['status' => !$brand->getRawOriginal('status')]);
    }
}