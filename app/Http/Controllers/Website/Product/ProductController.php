<?php

namespace App\Http\Controllers\Website\Product;

use App\Http\Controllers\Controller;
use App\Services\Website\ProductService;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService)
    {

    }

    public function getProductsForBaseOnSectionHome($type)
    {
        $timerDay = false;
        $timerWeek = false;
        if ($type === 'new-arrivals') {
            $products = $this->productService->getNewArrivals();

        } elseif ($type === 'flash-product-timer') {
            $products = $this->productService->getFlashProductTimer();
            $timerDay = true;
        } elseif ($type === 'flash-product-available-week') {
            $products = $this->productService->getFlashProductWeek();
            $timerWeek = true;

        } elseif ($type === 'product-discount') {
            $products = $this->productService->getFlashProduct();

        } else {
            abort(404);
        }
        return view('website.pages.products', compact('products', 'timerWeek', 'timerDay'));


    }
}
