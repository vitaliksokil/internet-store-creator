<?php


namespace App\Services\StripeService;


use App\Models\Shop\Shop;

interface StripeServiceInterface
{
    public function issetShopStripeAccount(Shop $shop);
    public function connectShopStripeAccount(Shop $shop);
}
