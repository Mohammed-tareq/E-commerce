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
            ->addColumn('name' ,function ($category){
                return $category->getTranslation('name',app()->getLocale());
            })
            ->addColumn('action' ,function ($category){
                return view('dashboard.category.action' ,compact('category'));
            })
            ->make(true);
    }

}