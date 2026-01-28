<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\AttributeService;
use App\Services\Dashboard\BrandService;
use App\Services\Dashboard\CategoryService;
use App\Services\Dashboard\ProductService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller implements HasMiddleware
{
    public function __construct(protected CategoryService $categoryService ,
                                protected BrandService $brandService,
                                protected AttributeService $attributeService,
                                protected ProductService $productService)
    {

    }

    public static function middleware()
    {
        return [
            new Middleware('can:products')
        ];
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


    public function show($id)
    {
        $product = $this->productService->showProduct($id);
        return view('dashboard.product.show', compact('product'));
    }


    public function edit(string $id)
    {
        $productId = $id;
        $categories = $this->categoryService->getCategoriesList();
        $brands = $this->brandService->getBrandsList();
        $attributesItem = $this->attributeService->getAttributesList();
        return view('dashboard.product.edit', compact('productId' , 'categories' , 'brands' , 'attributesItem'));
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy($id)
    {
        if(!$this->productService->deleteProduct($id))
        {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ],400);
        }

        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ],200);
    }

    public function changeStatus($id)
    {
        if(!$this->productService->changeStatus($id))
        {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ],400);
        }

        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ],200);
    }

    public function deleteVariant($productId , $variantId)
    {
        $product = $this->productService->deleteVariant($productId , $variantId);
        if(!$product)
        {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ],400);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success'),
            'product' => $product->variants
        ]);
    }
}
