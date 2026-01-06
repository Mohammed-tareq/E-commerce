<?php

namespace App\Repositories\Dashboard\Product;

use App\Models\Product;

class ProductRepository
{



    public function createProduct($data)
    {
        return Product::create($data);
    }
}