<?php

namespace App\Http\Controllers\Website\Product;

use App\Http\Controllers\Controller;
use App\Services\Website\ProductService;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService)
    {

    }
}
