<?php

namespace App\Repositories\Dashboard;

use App\Models\Category;

class CategoryRepository
{

    public function getCategories()
    {
        return Category::select('id','name' , 'parent' , 'status' , 'created_at')->get();
    }

}