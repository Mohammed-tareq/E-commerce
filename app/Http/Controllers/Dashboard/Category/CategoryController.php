<?php

namespace App\Http\Controllers\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryRequest;
use App\Services\Dashboard\CategoryService;
use Illuminate\Routing\Controllers\HasMiddleware;

class CategoryController extends Controller implements HasMiddleware
{
    public function __construct(protected CategoryService $categoryService)
    {
    }

    public static function middleware()
    {
        return ['can:categories'];
    }

    public function index()
    {
        return view('dashboard.category.index');
    }

    public function getCategories()
    {
        return $this->categoryService->getCategories();

    }

    public function create()
    {
        $categories = $this->categoryService->getCategoriesParent();
        return view('dashboard.category.create', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        $data = $request->only('name', 'parent' , 'status');
        if(!$this->categoryService->storeCategory($data)){
            return redirect()->back()->with('error', __('dashboard.operation_failed'));
        }
        return redirect()->route('dashboard.categories.index')->with('success', __('dashboard.operation_success'));
    }





    public function edit(string $id)
    {
        $category = $this->categoryService->getById($id);
        $categories = $this->categoryService->getCategoriesExceptChildren($id);
        return view('dashboard.category.edit', compact('categories', 'category'));
    }


    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->only('name', 'parent' , 'status');
        $data['id'] = $id;
        if(!$this->categoryService->updateCategory($data)){
            return redirect()->back()->with('error', __('dashboard.operation_failed'));
        }
        return redirect()->route('dashboard.categories.index')->with('success', __('dashboard.operation_success'));
    }


    public function destroy(string $id)
    {
        if(!$this->categoryService->deleteCategory($id)){
            return redirect()->back()->with('error', __('dashboard.operation_failed'));
        }
        return redirect()->route('dashboard.categories.index')->with('success', __('dashboard.operation_success'));
    }

    public function changeStatus($id)
    {
        $status = $this->categoryService->changeStatus($id);
        if(!$status){
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 400);
        }
        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ], 200);
    }
}
