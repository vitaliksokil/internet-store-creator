<?php

use App\Http\Controllers\DeliveryAddressController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\FeedbackController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\ShopSettingsController;
use App\Http\Controllers\Shop\ThemeController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\WishlistController;
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

Route::get('/', [PageController::class,'welcome'])->name('home');

Route::get('/shops/type/{type}', [PageController::class,'shops'])->name('shops.index');


Route::group(['prefix'=>'shops/{shop}'],function() {
    Route::get('/',[PageController::class,'showShop'])->name('shop.show');
    Route::group(['prefix'=>'products/{category}'],function() {
        Route::get('/',[PageController::class,'shopProductsByCategory'])->name('shop.products.show');
    });
    Route::group(['prefix'=>'product/{product}'],function() {
        Route::get('/',[PageController::class,'showProduct'])->name('shop.product.show');
    });
});

Route::group(['prefix'=>'profile','middleware'=>['auth','verified']],function() {
    Route::get('/',[ProfileController::class,'profileInfo'])->name('profile.info');
    Route::get('/edit',[ProfileController::class,'profileInfoEdit'])->name('profile.info.edit');
    Route::put('/edit',[ProfileController::class,'profileInfoUpdate'])->name('profile.info.update');

    Route::group(['prefix'=>'shopping-cart'],function(){
        Route::get('/',[ProfileController::class,'getShoppingCart'])->name('profile.shopping-cart');
        Route::post('/',[ShoppingCartController::class,'moveShoppingCartItemToWishlist'])->name('profile.shopping-cart.move-to-wishlist');
        Route::get('/{shoppingCart}',[ShoppingCartController::class,'destroy'])->name('shopping-cart.destroy');
        Route::get('/remove-all/{shop}',[ShoppingCartController::class,'destroyAll'])->name('shopping-cart.destroy.all');
        Route::post('/add-count',[ShoppingCartController::class,'addCount'])->name('shopping-cart.add-count');
    });
    Route::group(['prefix'=>'wishlist'],function(){
        Route::get('/',[ProfileController::class,'getWishlist'])->name('profile.wishlist');
        Route::post('/',[WishlistController::class,'moveWishlistItemToShoppingCart'])->name('profile.wishlist.move-to-shopping-cart');
        Route::get('/{wishlist}',[WishlistController::class,'destroy'])->name('wishlist.destroy');
        Route::get('/remove-all/{shop}',[WishlistController::class,'destroyAll'])->name('wishlist.destroy.all');
        Route::post('/move-all',[WishlistController::class,'moveAllToShoppingCart'])->name('profile.wishlist.move-all-to-shopping-cart');
    });
    Route::group(['prefix'=>'delivery-address'],function(){
        Route::get('/',[ProfileController::class,'getProfileDelivery'])->name('profile.delivery.get');
        Route::get('/edit',[DeliveryAddressController::class,'editProfileDelivery'])->name('profile.delivery.edit');
        Route::put('/update',[DeliveryAddressController::class,'updateDeliveryAddress'])->name('profile.delivery.update');
        Route::get('/get-cities/{area_ref}',[DeliveryAddressController::class,'getCities'])->name('profile.delivery.get.cities');
        Route::get('/get-warehouses/{city_ref}',[DeliveryAddressController::class,'getWarehouses'])->name('profile.delivery.get.warehouses');
    });
});

Route::group(['middleware'=>'auth'],function (){
    Route::group(['prefix'=>'feedbacks'],function (){
        Route::post('/',[FeedbackController::class,'store'])->name('feedback.store');
    });

    Route::group(['prefix'=>'shopping-cart'],function() {
        Route::post('/',[ShoppingCartController::class,'store'])->name('shopping-cart.store');

    });
    Route::group(['prefix'=>'wishlist'],function() {
        Route::post('/',[WishlistController::class,'store'])->name('wishlist.store');
    });
});
Route::group(['middleware'=>['hasNotShop']],function() {
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
    Route::group(['prefix'=>'shop-theme'],function(){
        Route::get('/',[ThemeController::class,'index'])->name('shop.theme.index');
        Route::get('/edit',[ThemeController::class,'edit'])->name('shop.theme.edit');
        Route::put('/edit',[ThemeController::class,'update'])->name('shop.theme.update');
    });
});

require __DIR__.'/auth.php';
