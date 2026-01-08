<?php

namespace App\Repositories\Dashboard\Product;

use App\Models\ProductVariant;

class ProductVariantRepository
{

    public function createProductVariant($data)
    {
        return ProductVariant::create($data);
    }

    public function getProductVariant($id)
    {
        return ProductVariant::find($id);
    }

    public function deleteProductVariant($productVariant)
    {
            return $productVariant->delete();
    }
}