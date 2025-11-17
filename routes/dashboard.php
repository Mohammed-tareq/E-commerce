<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


        ###################################### login ####################################
        Route::controller(LoginController::class)->group(function () {
            Route::get('login', 'showLogin')->name('show-login');
            Route::post('login', 'login')->name('login');
        });




    Route::get('/', function () {
        return view('dashboard/welcome');
    })->name('welcome');

});