<?php

namespace App\Repositories\Dashboard\Product;

use App\Models\Product;

class ProductRepository
{

    public function getProduct($id)
    {
        return Product::with([
            'category:id,name',
            'brand:id,name',
            'images',
            'variants.variantAttributes.attributeValue.attribute:id,name',
        ])->find($id);
    }

    public function getProducts()
    {
        return Product::with([
            'category:id,name',
            'brand:id,name',
            'images',
        ])->latest()->get();
    }


    public function createProduct($data)
    {
        return Product::create($data);
    }

    public function deleteProduct($product)
    {
        return $product->delete();
    }

    public function changeStatus($product)
    {
        return $product->update([
            'status' => !$product->getRawOriginal('status')
        ]);
    }
}