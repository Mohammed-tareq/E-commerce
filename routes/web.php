<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Website\Home\HomeController;
use App\Http\Controllers\Website\UserProfile\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use  App\Http\Controllers\Auth\LoginController;

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => 'website.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::redirect('/', '/home');


    #################################################### login #################################
    Route::controller(LoginController::class)->middleware('guest:web')->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.post');
    });

    #################################################### logout #################################
    Route::post('/logout', [LoginController::class, 'logOut'])->name('logout');

    #################################################### register #################################
    Route::controller(RegisterController::class)->middleware('guest:web')->group(function () {
        Route::get('/register', 'showRegistrationForm')->name('register');
        Route::post('/register', 'register')->name('register.post');
    });


    Route::middleware('auth:web')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::controller(UserProfileController::class)->group(function () {
            Route::get('/user-profile', 'index')->name('user-profile');
        });

    });

});
