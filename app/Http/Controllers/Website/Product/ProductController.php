<?php

namespace App\Http\Controllers\Website\Product;

use App\Http\Controllers\Controller;
use App\Services\Website\ProductService;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService)
    {

    }

    public function getProduct($slug)
    {
        $product = $this->productService->getProduct($slug);
        $productsRelated = $this->productService->getRelatedProductBySlug($slug,4);

        return view('website.pages.product-info', compact('product', 'productsRelated'));
    }

    public function getRelatedProductBySlug($slug)
    {
        $products = $this->productService->getRelatedProductBySlug($slug);
        return view('website.pages.products', compact('products'));
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
