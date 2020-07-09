<?php

use Illuminate\Support\Facades\Route;

// Pages
// Route::get('/', function () {
//     return view('pages.index');
// });

Route::view('/', 'pages.index');

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
    Route::namespace('Category')->prefix('/brands')->name('brand.')->group(function() {
        Route::get('/', 'BrandController@index')->name('index');
        Route::post('/store', 'BrandController@store')->name('store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
        Route::post('/update/{id}', 'BrandController@update')->name('update');
        Route::get('/delete/{id}', 'BrandController@delete')->name('delete');
    });

});
