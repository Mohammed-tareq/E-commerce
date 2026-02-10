<?php

use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\Password\ForgetpasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\ResetpasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\VerifyEmailController;
use App\Http\Controllers\Dashboard\Category\BrandController;
use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\contact\ContactController;
use App\Http\Controllers\Dashboard\Coupon\CouponController;
use App\Http\Controllers\Dashboard\Faq\FaqController;
use App\Http\Controllers\Dashboard\Faq\FaqQuestionController;
use App\Http\Controllers\Dashboard\Order\OrderController;
use App\Http\Controllers\Dashboard\Page\PageController;
use App\Http\Controllers\Dashboard\Product\Attribute\AttributeController;
use App\Http\Controllers\Dashboard\Product\ProductController;
use App\Http\Controllers\Dashboard\Role\RoleController;
use App\Http\Controllers\Dashboard\Setting\SettingController;
use App\Http\Controllers\Dashboard\Slider\SliderController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\World\WorldController;
use App\Http\Middleware\MarkNotificationAsRead;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/' . app()->getLocale() . '/livewire/update', $handle);
        });
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

            ###################################### Coupons ######################################
            Route::resource('coupons', CouponController::class)->except(['show', 'create', 'edit']);
            Route::get('/coupons-all', [CouponController::class, 'getCoupons'])->name('coupons.all');
            Route::get('coupon/{id}/status', [CouponController::class, 'changeStatus'])->name('coupon.status');

            ######################################Faqs ######################################
            Route::middleware('can:faqs')->group(function () {
                Route::resource('faqs', FaqController::class)->except(['show', 'create', 'edit']);
                ###################################### faqQuestion ############################
                Route::controller(FaqQuestionController::class)->name('faq-question.')->group(function () {
                    Route::get('faq-question', 'index')->name('index');
                    Route::get('faq-question/all', 'getFaqQuestionForDataTables')->name('all');
                    Route::delete('faq-question/{id}', 'deleteFaqQuestion')->name('delete');
                });

            });

            ######################################Settings ######################################
            Route::prefix('settings')->name('settings.')->group(function () {
                Route::get('/', [SettingController::class, 'index'])->name('index');
                Route::put('/update', [SettingController::class, 'update'])->name('update');
            });
            ###################################### Slider ######################################
            Route::prefix('slider')->name('slider.')->group(function () {
                Route::get('/', [SliderController::class, 'index'])->name('index');
                Route::get('/slider-all', [SliderController::class, 'getSliders'])->name('all');
                Route::post('/create', [SliderController::class, 'store'])->name('store');
                Route::delete('/delete/{id}', [SliderController::class, 'delete'])->name('delete');
            });

            ###################################### product Attributes ######################################
            Route::resource('attributes', AttributeController::class)->except(['show', 'create', 'edit']);
            Route::get('/attributes-all', [AttributeController::class, 'getAttributes'])->name('attributes.all');


            ###################################### product Attributes ######################################
            Route::resource('products', ProductController::class);
            Route::get('/products-all', [ProductController::class, 'getProducts'])->name('products.all');
            Route::get('product/{id}/status', [ProductController::class, 'changeStatus'])->name('product.status');
            Route::delete('product/{productId}/variants/{variantId}', [ProductController::class, 'deleteVariant'])->name('product.variant.delete');

            ######################################### Users ###############################################
            Route::prefix('users')->controller(UserController::class)->name('user.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/users-all', 'getUsers')->name('all');
                Route::post('/create', 'createUser')->name('create');
                Route::get('/{id}/status', 'changeStatus')->name('status');
                Route::delete('/{id}/delete', 'deleteUser')->name('delete');
            });
            ######################################### Orders ###############################################
            Route::prefix('orders')->middleware('can:orders')->controller(OrderController::class)->name('order.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/orders-all', 'getOrders')->name('all');
                Route::get('/{id}/show', 'showOrder')->name('show')->middleware(MarkNotificationAsRead::class);
                Route::get('/{id}/status', 'changeStatus')->name('status');
                Route::delete('/{id}/delete', 'deleteOrder')->name('delete');
            });

            ######################################### pages ###############################################
            Route::middleware('can:pages')->group(function () {
                Route::resource('pages', PageController::class)->except(['show']);
                Route::get('pages/pages-all', [PageController::class, 'getPagesForDataTable'])->name('page.all');
                Route::get('page/{id}/status', [PageController::class, 'changeStaus'])->name('page.status');
                Route::post('page/{id}/delete-image', [PageController::class, 'deleteImagePage'])->name('page.delete.image');

            });

            ######################################### contact ###############################################
            Route::get('contacts', [ContactController::class, 'index'])->name('contact.index');

            Route::get('/welcome', function () {
                return view('dashboard/welcome');
            })->name('welcome');
        });
    }
);
