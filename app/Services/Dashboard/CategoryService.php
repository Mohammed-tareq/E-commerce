<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CategoryRepository;
use Yajra\DataTables\Facades\DataTables;

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository)
    {

    }

    public function getCategories()
    {
        $categories = $this->categoryRepository->getCategories();

        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('name', function ($category) {
                return $category->getTranslation('name', app()->getLocale());
            })
            ->addColumn('products_count', function ($category) {
                return $category->products_count == 0 ? __('dashboard.not_found') : $category->products_count;
            })
            ->addColumn('action', function ($category) {
                return view('dashboard.category.action', compact('category'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getById($id)
    {
        $category = $this->categoryRepository->getById($id);
        if (!$category) {
            abort(404);
        }
        return $category;
    }

    public function storeCategory($data)
    {
        return $this->categoryRepository->storeCategory($data);
    }

    public function updateCategory( $data)
    {
        $category = $this->getById($data['id']);
        return $this->categoryRepository->updateCategory($category, $data);
    }

    public function deleteCategory($id)
    {
        $category = $this->getById($id);
        return $this->categoryRepository->deleteCategory($category);
    }

    public function getCategoriesParent()
    {
        return $this->categoryRepository->getCategoriesParent();
    }

    public function getCategoriesExceptChildren($id)
    {
        return $this->categoryRepository->getCategoriesExceptChildren($id);
    }

    public function changeStatus($id)
    {
        $category = $this->getById($id);
        return $this->categoryRepository->changeStatus($category);

    }

}