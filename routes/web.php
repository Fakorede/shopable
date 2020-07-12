<?php

use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::view('/', 'pages.index');

Route::post('/newsletter/store', 'FrontendController@storeNewsletter')->name('newsletter.store');

// Get SubCategories with AJAX request
Route::get('/subcategories/{id}', 'Admin\Product\ProductController@getSubCategories')->name('subcategories');

// User Auth Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::get('/password-update', 'HomeController@updatePassword')->name('password.update');
// Route::post('/user/logout', 'LoginController@logout')->name('user.logout');

// Admin Routes
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace ('Auth')->group(function () {
        // Login Routes
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');

        Route::prefix('/password')->group(function () {
            // Forgot Password Routes...
            Route::get('/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
            Route::post('/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

            // Reset Password Routes
            Route::get('/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
            Route::post('/reset/update', 'ResetPasswordController@reset')->name('password.update');

        });
    });

    // Change Password Routes
    Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
    Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');

    // Category Routes
    Route::namespace ('Category')->prefix('/categories')->name('category.')->group(function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('delete');
    });

    // Brand Routes
    Route::namespace ('Category')->prefix('/brands')->name('brand.')->group(function () {
        Route::get('/', 'BrandController@index')->name('index');
        Route::post('/store', 'BrandController@store')->name('store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
        Route::post('/update/{id}', 'BrandController@update')->name('update');
        Route::get('/delete/{id}', 'BrandController@delete')->name('delete');
    });

    // SubCategory Routes
    Route::namespace ('Category')->prefix('/subcategories')->name('subcategory.')->group(function () {
        Route::get('/', 'SubCategoryController@index')->name('index');
        Route::post('/store', 'SubCategoryController@store')->name('store');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'SubCategoryController@update')->name('update');
        Route::get('/delete/{id}', 'SubCategoryController@delete')->name('delete');
    });

    // Coupon Routes
    Route::namespace ('Category')->prefix('/coupons')->name('coupon.')->group(function () {
        Route::get('/', 'CouponController@index')->name('index');
        Route::post('/store', 'CouponController@store')->name('store');
        Route::get('/edit/{id}', 'CouponController@edit')->name('edit');
        Route::post('/update/{id}', 'CouponController@update')->name('update');
        Route::get('/delete/{id}', 'CouponController@delete')->name('delete');
    });

    // Newsletter Routes
    Route::namespace ('Newsletter')->prefix('/newsletters')->name('newsletter.')->group(function () {
        Route::get('/', 'NewsletterController@index')->name('index');
        Route::get('/delete/{id}', 'NewsletterController@delete')->name('delete');
    });

    // Product Routes
    Route::namespace ('Product')->group(function () {
        Route::resource('/products', 'ProductController');
        Route::get('/products/{product}/status', 'ProductController@status')->name('products.status');
        Route::get('/products/{product}/delete', 'ProductController@delete')->name('products.delete');
    });

});
