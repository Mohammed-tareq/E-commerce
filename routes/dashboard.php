<?php

use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\Password\ForgetpasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\ResetpasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\VerifyEmailController;
use App\Http\Controllers\Dashboard\Category\BrandController;
use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\Role\RoleController;
use App\Http\Controllers\Dashboard\World\WorldController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    ###################################### login ####################################
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'showLogin')->name('show-login');
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout')->name('logout');
    });

    ################################### Reset Password ###############################
    Route::prefix('password')->group(function () {
        Route::controller(ForgetpasswordController::class)->group(function () {
            Route::get('forget-password', 'showForgetPassword')->name('forget.password.show');
            Route::post('forget-password', 'sendOtp')->name('forget.password.send');
        });

        Route::controller(VerifyEmailController::class)->group(function () {
            Route::get('verify-email/{email}', 'showVerifyEmailForm')->name('verify.email.show');
            Route::post('verify-email', 'verifyOtp')->name('verify.email.otp');
        });

        Route::controller(ResetpasswordController::class)->group(function () {
            Route::get('reset-password/{email}', 'showResetPasswordForm')->name('reset.password.show');
            Route::post('reset-password/{email}', 'ResetPassword')->name('reset.password');
        });
    });


    Route::middleware('auth:admin')->group(function () {


        ###################################### Roles ######################################
        Route::resource('roles', RoleController::class)->except(['show']);

        ###################################### Admins ######################################
        Route::resource('admins', AdminController::class)->except(['show']);
        Route::get('admins/{id}/status', [AdminController::class, 'changeStatus'])->name('admins.status');

        ###################################### Countries ######################################
        Route::controller(WorldController::class)->group(function () {
            Route::prefix('countries')->name('countries.')->group(function () {
                Route::get('/', 'getCountries')->name('index');
                Route::get('/{id}/status', 'changeStatusForCountry')->name('status');
                Route::get('/governorates/{country}', 'getGovernorateByCountry')->name('governorates');
            });

            Route::prefix('governorates')->name('governorates.')->group(function () {
                Route::get('governorates/{id}/status', 'changeStatusForGovernorate')->name('status');
                Route::put('/{id}/price', 'changeShippingPrice')->name('price');
            });

        });


        ###################################### Categories ######################################
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::get('categories-all', [CategoryController::class, 'getCategories'])->name('categories.all');
        Route::get('category/{id}/status', [CategoryController::class, 'changeStatus'])->name('category.status');

        ###################################### Brands ######################################
        Route::resource('brands', BrandController::class)->except(['show']);
        Route::get('/brands-all', [BrandController::class, 'getBrands'])->name('brands.all');
        Route::get('brand/{id}/status', [BrandController::class, 'changeStatus'])->name('brand.status');


        Route::get('/welcome', function () {
            return view('dashboard/welcome');
        })->name('welcome');
    });


});