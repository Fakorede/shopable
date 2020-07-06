<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// User Auth Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::get('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@logout')->name('user.logout');

// Admin Routes
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/change/password', 'HomeController@changePassword')->name('password.change');
    Route::post('/update/password', 'HomeController@updatePassword')->name('password.update');

    Route::namespace ('Auth')->group(function () {
        // Login Routes
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');

        Route::prefix('/password')->group(function(){
            // Forgot Password Routes...
            Route::get('/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
            Route::post('/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

            // Reset Password Routes
            Route::get('/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
            Route::post('/reset', 'ResetPasswordController@reset')->name('password.update');
        });
    });

});
