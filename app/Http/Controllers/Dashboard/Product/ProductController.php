<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Services\Dashboard\AttributeService;
use App\Services\Dashboard\BrandService;
use App\Services\Dashboard\CategoryService;
use App\Services\Dashboard\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected CategoryService $categoryService ,
                                protected BrandService $brandService,
                                protected AttributeService $attributeService,
                                protected ProductService $productService)
    {

    }

    public function index()
    {
        return view('dashboard.product.index');
    }

    public function getProducts()
    {
        return $this->productService->getProducts();
    }


    public function create()
    {
        $categories = $this->categoryService->getCategoriesList();
        $brands = $this->brandService->getBrandsList();
        $attributesItem = $this->attributeService->getAttributesList();

        return view('dashboard.product.create', compact('categories' , 'brands' , 'attributesItem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
