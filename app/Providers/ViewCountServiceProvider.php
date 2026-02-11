<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewCountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer('dashboard.*', callback: function () {
            $models = [
                'admins_count' => Admin::class,
                'categories_count' => Category::class,
                'brands_count' => Brand::class,
                'coupons_count' => Coupon::class,
                'faqs_count' => Faq::class,
                'products_count' => Product::class,
                'users_count' => User::class,
                'orders_count' => Order::class,
            ];

            $counts = [];
            foreach ($models as $key => $model) {
                $counts[$key] = Cache::remember($key, 3600, fn() => $model::count());
            }


            $counts['contact_count'] = Cache::remember('contact_count', 3600,
                fn() => Contact::where('is_read', true)->count());

            view()->share($counts);
        });


        view()->composer('website.*', function () {
            $pages = Page::active()->select('id', 'title', 'slug')->get();
            $categories = $this->getCategory();
            $categoryChildren = $this->getCategoryChild();
            view()->share([
                'pages' => $pages,
                'categories' => $categories,
                'categoryChildren' => $categoryChildren
            ]);
        });
    }

    public function getCategory()
    {
        return Category::active()
            ->latest()
            ->limit(12)
            ->get();
    }
    public function getCategoryChild()
    {
        return Category::active()
            ->select('id', 'slug', 'name', 'image')
            ->has('children', '>=', 3)
            ->with([
                'children' => fn($q) => $q->latest()->limit(4)
            ])
            ->latest()
            ->limit(4)
            ->get();
    }
}
