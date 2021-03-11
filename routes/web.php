<?php

use App\Http\Controllers\PageController;
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
});

require __DIR__.'/auth.php';
