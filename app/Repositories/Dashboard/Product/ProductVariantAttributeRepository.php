<?php

namespace App\Repositories\Dashboard\Product;

use App\Models\VariantAttribute;

class ProductVariantAttributeRepository
{

    public function createProductVariantAttribute($data)
    {
        return VariantAttribute::create($data);
    }

}