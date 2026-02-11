<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Website\Brand\BrandController;
use App\Http\Controllers\Website\Cart\CartController;
use App\Http\Controllers\Website\Category\CategoryController;
use App\Http\Controllers\Website\CheckOut\CheckOutController;
use App\Http\Controllers\Website\Contactus\ContactUsController;
use App\Http\Controllers\Website\DynamicPage\PageController;
use App\Http\Controllers\Website\Faq\FaqController;
use App\Http\Controllers\Website\Home\HomeController;
use App\Http\Controllers\Website\Product\ProductController;
use App\Http\Controllers\Website\UserProfile\UserProfileController;
use App\Http\Controllers\Website\WishList\WishLastController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    Route::post('/logout', [LoginController::class, 'logOut'])->name('logout')->middleware('auth:web');

    #################################################### register #################################
    Route::controller(RegisterController::class)->middleware('guest:web')->group(function () {
        Route::get('/register', 'showRegistrationForm')->name('register');
        Route::post('/register', 'register')->name('register.post');
    });


    ####################################### global routes ###########################################
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('page/{slug}', [PageController::class, 'getPage'])->name('dynamic.page');
    Route::get('/faqs', [FaqController::class, 'index'])->name('faq.index');
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.index');

    ####################################### category routes ###########################################
    Route::controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('/categories', 'index')->name('index');
        Route::get('/category/{slug}/products', 'getProductsForCategory')->name('products');
    });
    Route::controller(BrandController::class)->name('brand.')->group(function () {
        Route::get('/brands', 'index')->name('index');
        Route::get('/brand/{slug}/products', 'getProductsForBrand')->name('products');
    });

    Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
        Route::get('/{type}', 'getProductsForBaseOnSectionHome')->name('section.show');
        Route::get('/show/{slug}', 'getProduct')->name('show');
        Route::get('/related-product/{slug}', 'getRelatedProductBySlug')->name('related.product');
    });


    ####################################### auth routes ###########################################
    Route::middleware('auth:web')->group(function () {

        Route::controller(UserProfileController::class)->group(function () {
            Route::get('/user-profile', 'index')->name('user-profile');
        });

        ####################################### wish-list routes ###########################################
        Route::get('/wish-list', WishLastController::class)->name('wish-list');

        ####################################### cart routes ###########################################
        Route::get('/cart', CartController::class)->name('cart');

        ####################################### check out routes ###########################################
        Route::controller(CheckOutController::class)->name('checkout.')->group(function () {
            Route::get('/check-out', 'index')->name('index');
            Route::post('/check-out/{userId}', 'checkout')->name('store');
            Route::get('/callback', 'callback')->name('callback');
            Route::get('/error', 'errorCallBack')->name('errorCallBack');

        });
    });

});


