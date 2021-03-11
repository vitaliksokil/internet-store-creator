<?php

namespace App\Providers;

use App\Services\FileUploaderService\FileUploaderService;
use App\Services\FileUploaderService\FileUploaderServiceInterface;
use App\Services\ShopService\ShopService;
use App\Services\ShopService\ShopServiceInterface;
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
    }
}
