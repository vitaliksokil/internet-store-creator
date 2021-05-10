<?php

namespace App\Providers;

use App\Services\CategoryService\CategoryService;
use App\Services\CategoryService\CategoryServiceInterface;
use App\Services\DeliveryAddressService\DeliveryAddressService;
use App\Services\DeliveryAddressService\DeliveryAddressServiceInterface;
use App\Services\FeedbacksService\FeedbackService;
use App\Services\FeedbacksService\FeedbackServiceInterface;
use App\Services\FileUploaderService\FileUploaderService;
use App\Services\FileUploaderService\FileUploaderServiceInterface;
use App\Services\NewPostApiService\NewPostApiService;
use App\Services\NewPostApiService\NewPostApiServiceInterface;
use App\Services\OrderService\OrderService;
use App\Services\OrderService\OrderServiceInterface;
use App\Services\ProductService\ProductService;
use App\Services\ProductService\ProductServiceInterface;
use App\Services\ShoppingCartService\ShoppingCartService;
use App\Services\ShoppingCartService\ShoppingCartServiceInterface;
use App\Services\ShopService\ShopService;
use App\Services\ShopService\ShopServiceInterface;
use App\Services\ShopSettingsService\ShopSettingsService;
use App\Services\ShopSettingsService\ShopSettingsServiceInterface;
use App\Services\StripeService\StripeService;
use App\Services\StripeService\StripeServiceInterface;
use App\Services\UserService\UserService;
use App\Services\UserService\UserServiceInterface;
use App\Services\Wishlist\WishlistService;
use App\Services\Wishlist\WishlistServiceInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->bind(FileUploaderServiceInterface::class,FileUploaderService::class);
        $this->app->bind(ShopServiceInterface::class,ShopService::class);
        $this->app->bind(CategoryServiceInterface::class,CategoryService::class);
        $this->app->bind(ProductServiceInterface::class,ProductService::class);
        $this->app->bind(ShopSettingsServiceInterface::class,ShopSettingsService::class);
        $this->app->bind(FeedbackServiceInterface::class,FeedbackService::class);
        $this->app->bind(UserServiceInterface::class,UserService::class);
        $this->app->bind(ShoppingCartServiceInterface::class,ShoppingCartService::class);
        $this->app->bind(WishlistServiceInterface::class,WishlistService::class);
        $this->app->bind(NewPostApiServiceInterface::class,NewPostApiService::class);
        $this->app->bind(DeliveryAddressServiceInterface::class,DeliveryAddressService::class);
        $this->app->bind(StripeServiceInterface::class,StripeService::class);
        $this->app->bind(OrderServiceInterface::class,OrderService::class);
    }
}
