<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\ShopSettingsController;
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

Route::group(['middleware'=>['hasNotShop']],function() {
    Route::get('/', [PageController::class,'welcome'])->middleware(['guest']);
    Route::group(['middleware'=>['auth','verified']],function() {
        Route::get('/dashboard', [PageController::class,'dashboard'])->name('dashboard');
        Route::group(['prefix'=>'shop'],function(){
            Route::post('/',[ShopController::class,'store'])->name('shop.store');
        });
    });
});
Route::group(['prefix'=>'shop','middleware'=>['auth','hasShop','verified']],function(){
    Route::get('/', [ShopController::class,'index'])->name('shop.index');
    Route::get('/edit', [ShopController::class,'edit'])->name('shop.edit');
    Route::put('/edit', [ShopController::class,'update'])->name('shop.update');

    Route::group(['prefix'=>'categories'],function(){
        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::get('/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::put('/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/create/new',[CategoryController::class,'create'])->name('category.create');
        Route::post('/',[CategoryController::class,'store'])->name('category.store');
        Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

        Route::get('/products/{category}',[ProductController::class,'productsByCategory'])->name('category.products');

    });
    Route::group(['prefix'=>'products'],function(){
        Route::get('/',[ProductController::class,'index'])->name('product.index');
        Route::get('/{product}',[ProductController::class,'edit'])->name('product.edit');
        Route::put('/{product}',[ProductController::class,'update'])->name('product.update');
        Route::get('/create/new/{category}',[ProductController::class,'create'])->name('product.create');
        Route::post('/{category}',[ProductController::class,'store'])->name('product.store');

        Route::get('/delete/{product}',[ProductController::class,'destroy'])->name('product.destroy');
    });
    Route::group(['prefix'=>'shop-settings'],function(){
        Route::get('/',[ShopSettingsController::class,'index'])->name('settings.index');
        Route::get('/edit',[ShopSettingsController::class,'edit'])->name('settings.edit');
        Route::put('/edit',[ShopSettingsController::class,'update'])->name('settings.update');
    });
});

require __DIR__.'/auth.php';
