<?php

namespace App\Providers;

use App\Services\CategoryService\CategoryService;
use App\Services\CategoryService\CategoryServiceInterface;
use App\Services\FeedbacksService\FeedbackService;
use App\Services\FeedbacksService\FeedbackServiceInterface;
use App\Services\FileUploaderService\FileUploaderService;
use App\Services\FileUploaderService\FileUploaderServiceInterface;
use App\Services\ProductService\ProductService;
use App\Services\ProductService\ProductServiceInterface;
use App\Services\ShoppingCartService\ShoppingCartService;
use App\Services\ShoppingCartService\ShoppingCartServiceInterface;
use App\Services\ShopService\ShopService;
use App\Services\ShopService\ShopServiceInterface;
use App\Services\ShopSettingsService\ShopSettingsService;
use App\Services\ShopSettingsService\ShopSettingsServiceInterface;
use App\Services\UserService\UserService;
use App\Services\UserService\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
    }
}
