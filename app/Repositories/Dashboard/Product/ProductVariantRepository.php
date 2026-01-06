<?php

namespace App\Repositories\Dashboard\Product;

use App\Models\ProductVariant;

class ProductVariantRepository
{

    public function createProductVarinat($data)
    {
        return ProductVariant::create($data);
    }
}