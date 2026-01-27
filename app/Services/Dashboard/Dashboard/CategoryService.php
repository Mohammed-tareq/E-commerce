<?php

namespace App\Services\Dashboard\Dashboard;

use App\Repositories\Dashboard\CategoryRepository;
use App\Utils\ImageManagement;
use Yajra\DataTables\Facades\DataTables;

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository, protected ImageManagement $imageManagement)
    {

    }

    public function getCategoriesList()
    {
        return $this->categoryRepository->getCategories();
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
            ->addColumn('image', function ($category) {
                return view('dashboard.category.data-table.image', compact('category'));
            })
            ->addColumn('action', function ($category) {
                return view('dashboard.category.data-table.action', compact('category'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getById($id)
    {
        return  $this->categoryRepository->getById($id)?? abort(404);
    }

    public function storeCategory($data)
    {
        if (array_key_exists('image', $data) && $data['image'] !== null) {
            $data['image'] = $this->imageManagement->uploadSingleImage('/', $data['image'], 'categories');
        }
        return $this->categoryRepository->storeCategory($data);
    }

    public function updateCategory($data)
    {
        $category = $this->getById($data['id']);
        $oldImage = $category->image;
        if (array_key_exists('image', $data) && $data['image'] !== null) {
            $data['image'] = $this->imageManagement->uploadSingleImage('/', $data['image'], 'categories');
            $this->imageManagement->deleteImageFromLocal($oldImage);
        }
        return $this->categoryRepository->updateCategory($category, $data);
    }

    public function deleteCategory($id)
    {
        $category = $this->getById($id);
        if (!$category) {
            return false;
        }
        $this->imageManagement->deleteImageFromLocal($category->image);
        self::updateCache();
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
        if (!$category) {
            return false;
        }
        return $this->categoryRepository->changeStatus($category);

    }

    private function updateCache()
    {
        cache()->forget('categories_count');
    }

}