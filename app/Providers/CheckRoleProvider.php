<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class CheckRoleProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        foreach(config('permissions_en') as $permission => $value)
        {
            Gate::define($permission, function ($admin) use($permission) {
                return $admin->haspermission($permission);
            });
        }
    }
}
