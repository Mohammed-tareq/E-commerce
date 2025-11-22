<?php

use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\Password\ForgetpasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\ResetpasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\VerifyEmailController;
use App\Http\Controllers\Dashboard\Role\RoleController;
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
        Route::resource('admins', AdminController::class);
        Route::get('admins/{id}/status', [AdminController::class, 'changeStatus'])->name('admins.status');

        Route::get('/welcome', function () {
            return view('dashboard/welcome');
        })->name('welcome');
    });



});