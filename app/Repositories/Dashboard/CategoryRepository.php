<?php

namespace App\Repositories\Dashboard;

use App\Models\Category;

class CategoryRepository
{

    public function getCategories()
    {
        return Category::withCount('products')->latest()->get();
    }


    public function getById($id)
    {
        $category = Category::find($id);
        return $category;
    }
    public function storeCategory($data)
    {
        return Category::create($data);
    }

    public function updateCategory($category, $data)
    {
        $category->update($data);
        return $category;
    }
    public function deleteCategory($category)
    {
        $category->delete();
        return $category;
    }

    public function getCategoriesParent()
    {
        $categories = Category::whereNull('parent')->get();
        return $categories;
    }

    public function getCategoriesExceptChildren($id)
    {
        $categories = Category::where('id', '!=', $id)
            ->whereNull('parent')
            ->get();
        return $categories;
    }

    public function changeStatus($category)
    {
        return $category->update(['status' => !$category->getRawOriginal('status')]);

    }

}
