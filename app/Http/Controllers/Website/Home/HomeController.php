<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;
use App\Services\Website\GlobalService;

class HomeController extends Controller
{

    public function __construct(protected GlobalService $globalService)
    {
    }

    public function index()
    {
        $sliders = $this->globalService->getSliders();
        $categories = $this->globalService->getCategories(12);
        $brands = $this->globalService->getBrands(12);
        $newArrivals = $this->globalService->getNewArrivals(8);
        $flashProducts = $this->globalService->getFlashProduct(12);
        $flashProductsTimer = $this->globalService->getFlashProductTimer(4);
        return view('website.home.home',
            compact('sliders',
                'categories',
                'brands',
                'newArrivals',
                'flashProducts',
                'flashProductsTimer'));
    }


}

