<?php

namespace App\Http\Controllers\Website\Brand;

use App\Http\Controllers\Controller;
use App\Services\Website\GlobalService;

class BrandController extends Controller
{
    public function __construct(protected GlobalService $globalService){}

    public function index()
    {
        $brands = $this->globalService->getBrands();
        return view('website.pages.brand', compact('brands'));
    }

    public function getProductsForBrand($slug)
    {
        $products = $this->globalService->getProductsForBrand($slug);
        return view('website.pages.products', compact('products'));
    }
}
