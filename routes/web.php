<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\ShopController;
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
    Route::get('/dashboard', [PageController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
    Route::group(['prefix'=>'shop'],function(){
        Route::post('/',[ShopController::class,'store'])->name('shop.store');
    });
});
Route::group(['prefix'=>'shop','middleware'=>['auth','hasShop']],function(){
    Route::get('/', [ShopController::class,'index'])->name('shop.index');
    Route::get('/edit', [ShopController::class,'edit'])->name('shop.edit');
    Route::put('/edit', [ShopController::class,'update'])->name('shop.update');

    Route::group(['prefix'=>'categories'],function(){
        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::get('/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::get('/create/new',[CategoryController::class,'create'])->name('category.create');
    });
    Route::group(['prefix'=>'products'],function(){
        Route::get('/',[ProductController::class,'index'])->name('product.index');
        Route::get('/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::get('/create/new',[ProductController::class,'create'])->name('product.create');
    });
});

require __DIR__.'/auth.php';
