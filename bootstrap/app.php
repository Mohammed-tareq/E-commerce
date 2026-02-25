<?php

use App\Exceptions\ApiHandler;
use App\Http\Middleware\MarkNotificationAsRead;
use App\Http\Middleware\SetLangMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath;
use Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        channels: __DIR__ . '/../routes/channels.php',
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        api: __DIR__ . '/../routes/api.php',
        then: function () {
            Route::middleware('web')->group(base_path('routes/dashboard.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->use([
            MarkNotificationAsRead::class,
        ]);
        $middleware->redirectGuestsTo(function () {
            if (request()->is('*/dashboard/*'))
                return route('dashboard.show-login');
            else
                return route('website.login');
        });

        $middleware->redirectUsersTo(function () {
            if (Auth::guard('admin')->check() && request()->is('*/dashboard/*'))
                return route('dashboard.welcome');
            else
                return route('website.home');
        });


        $middleware->alias([
            'localize' => LaravelLocalizationRoutes::class,
            'localizationRedirect' => LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect' => LocaleSessionRedirect::class,
            'localeCookieRedirect' => LocaleCookieRedirect::class,
            'localeViewPath' => LaravelLocalizationViewPath::class,
        ]);

        $middleware->api(prepend: [
            SetLangMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render([new ApiHandler, '__invoke']);
    })->create();
