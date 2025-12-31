<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $categories = [
            [
                'name' => ['en' => 'Electronics', 'ar' => 'إلكترونيات'],
                'parent' => null,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Clothes', 'ar' => 'ملابس'],
                'parent' => null,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Mobile Phones', 'ar' => 'هواتف محمولة'],
                'parent' => 1,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Shoes', 'ar' => 'أحذية'],
                'parent' => 2,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Home Furniture', 'ar' => 'أثاث منزلي'],
                'parent' => null,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Home Appliances', 'ar' => 'أجهزة كهربائية'],
                'parent' => 1,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Watches & Accessories', 'ar' => 'ساعات وإكسسوارات'],
                'parent' => null,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Bags', 'ar' => 'حقائب'],
                'parent' => 2,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Pet Supplies', 'ar' => 'مستلزمات الحيوانات'],
                'parent' => null,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Computers & Laptops', 'ar' => 'كمبيوتر ولابتوب'],
                'parent' => 1,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Home Decor', 'ar' => 'ديكور المنزل'],
                'parent' => 5,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Makeup', 'ar' => 'مكياج'],
                'parent' => null,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Skin Care', 'ar' => 'عناية بالبشرة'],
                'parent' => 12,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Sports & Fitness', 'ar' => 'رياضة ولياقة'],
                'parent' => null,
                'status' => rand(0,1),
            ],
            [
                'name' => ['en' => 'Kids Toys', 'ar' => 'ألعاب أطفال'],
                'parent' => null,
                'status' => rand(0,1),
            ],
        ];


        foreach ($categories as $category) {
            $category['slug'] = $category['name']['en'];
           Category::create($category);
        }

    }
}
