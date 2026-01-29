<?php

namespace App\Http\Controllers\Website\Category;

use App\Http\Controllers\Controller;
use App\Services\Website\GlobalService;

class CategoryController extends Controller
{
    public function __construct(protected GlobalService $globalService)
    {}

    public function index()
    {
        $categories = $this->globalService->getCategories();
        return view('website.pages.category', compact('categories'));
    }
}
