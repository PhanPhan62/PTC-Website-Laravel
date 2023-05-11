<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['checkpower'])->group(function () {
    Route::controller(App\Http\Controllers\Admin\Admin_CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('Category');
        Route::get('/category/create', 'create')->name('create.category');
        Route::post('/categorystore', 'store')->name('store.categorry');
        Route::get('/category/{id}/edit', 'edit')->name('edit.category');
        Route::put('/category/{id}', 'update')->name('update.category');
        Route::delete('/category/destroy/{id}', 'destroy')->name('destroy.category');
        Route::get('/category/show/{id}', 'show')->name('show.category');
    });
    Route::controller(App\Http\Controllers\Admin\Admin_ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::get('/product/create', 'create')->name('create.product');
        Route::post('/productstore', 'store')->name('store.product');
        Route::get('/product/{id}/edit', 'edit')->name('edit.product');
        Route::put('/product/{id}', 'update')->name('update.product');
        Route::delete('/product/destroy/{id}', 'destroy')->name('destroy.product');
        Route::get('/product/show/{id}', 'show')->name('show.product');
    });
    Route::controller(App\Http\Controllers\Admin\Admin_DonViTinhController::class)->group(function () {
        Route::get('/dvt', 'index')->name('dvt');
        Route::get('/dvt/create', 'create')->name('create.dvt');
        Route::post('/dvtstore', 'store')->name('store.dvt');
        Route::get('/dvt/{id}/edit', 'edit')->name('edit.dvt');
        Route::put('/dvt/{id}', 'update')->name('update.dvt');
        Route::delete('/dvt/destroy/{id}', 'destroy')->name('destroy.dvt');
        Route::get('/dvt/show/{id}', 'show')->name('show.dvt');
    });
    Route::controller(App\Http\Controllers\Admin\Admin_MauController::class)->group(function () {
        Route::get('/mau', 'index')->name('mau');
        Route::get('/mau/create', 'create')->name('create.mau');
        Route::post('/maustore', 'store')->name('store.mau');
        Route::get('/mau/{id}/edit', 'edit')->name('edit.mau');
        Route::put('/mau/{id}', 'update')->name('update.mau');
        Route::delete('/mau/destroy/{id}', 'destroy')->name('destroy.mau');
        Route::get('/mau/show/{id}', 'show')->name('show.mau');
    });
    Route::controller(App\Http\Controllers\Admin\Admin_SizeController::class)->group(function () {
        Route::get('/size', 'index')->name('size');
        Route::get('/size/create', 'create')->name('create.size');
        Route::post('/sizestore', 'store')->name('store.size');
        Route::get('/size/{id}/edit', 'edit')->name('edit.size');
        Route::put('/size/{id}', 'update')->name('update.size');
        Route::delete('/size/destroy/{id}', 'destroy')->name('destroy.size');
        Route::get('/size/show/{id}', 'show')->name('show.size');
    });
    Route::controller(App\Http\Controllers\Admin\Admin_NSXController::class)->group(function () {
        Route::get('/nhasanxuat', 'index')->name('nhasanxuat');
        Route::get('/nhasanxuat/create', 'create')->name('create.nhasanxuat');
        Route::post('/nhasanxuatstore', 'store')->name('store.nhasanxuat');
        Route::get('/nhasanxuat/{id}/edit', 'edit')->name('edit.nhasanxuat');
        Route::put('/nhasanxuat/{id}', 'update')->name('update.nhasanxuat');
        Route::delete('/nhasanxuat/destroy/{id}', 'destroy')->name('destroy.nhasanxuat');
        Route::get('/nhasanxuat/show/{id}', 'show')->name('show.nhasanxuat');
    });

    Route::controller(App\Http\Controllers\AdminController::class)->group(function () {
        Route::get('/admin', 'admin')->name('admin');
    });
});
Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/productdetail/{id?}', 'productdetail')->name('productdetail');
    Route::get('/shop/{id?}', 'shop')->name('shop');
    Route::get('/shopcart', 'shopcart')->name('shopcart');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/signin', 'signin')->name('signin')->middleware();
    Route::post('/postSignin', 'postsignin')->name('postSignin');
    Route::post('/signup', 'postsignup')->name('postsignup');
    Route::get('/signup', 'signup')->name('signup');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/layout', 'layout')->name('layout');
    Route::group(['prefix' => 'cart'], function () {
        Route::controller(App\Http\Controllers\CartController::class)->group(function () {
            Route::get('/view', 'view')->name('viewCart');
            Route::get('/addCart{id}', 'add')->name('addCart');
            Route::get('/removeCart/{id}', 'remove')->name('removeCart');
            Route::get('/updateCart/{id}', 'update')->name('updateCart');
            Route::get('/clearCart/{id}', 'clear')->name('clearCart');
        });
    });
});
