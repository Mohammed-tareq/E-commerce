<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
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
        view()->composer('dashboard.*', function () {
            $models = [
                'admins_count' => Admin::class,
                'categories_count' => Category::class,
                'brands_count' => Brand::class,
                'coupons_count' => Coupon::class,
            ];

            $counts = [];
            foreach ($models as $key => $model) {
                $counts[$key] = Cache::remember($key, 3600, fn() => $model::count());
            }

            view()->share($counts);
        });
    }
}
