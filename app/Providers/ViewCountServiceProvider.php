<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
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
            if (!Cache::has('admins_count')) {
                Cache::remember('admins_count', now()->addMinutes(60), function () {
                    return Admin::count();
                });
            }

            if (!Cache::has('categories_count')) {
                Cache::remember('categories_count', now()->addMinutes(60), function () {
                    return Category::count();
                });
            }

            if (!Cache::has('brands_count')) {
                Cache::remember('brands_count', now()->addMinutes(60), function () {
                    return Brand::count();
                });
            }

            view()->share([
                'admins_count' => Cache::get('admins_count'),
                'categories_count' => Cache::get('categories_count'),
                'brands_count' => Cache::get('brands_count'),
            ]);
        });
    }
}
