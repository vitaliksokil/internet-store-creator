<?php


namespace App\Services\StripeService;


use App\Models\Order;
use App\Models\Shop\Shop;
use App\Models\User;

interface StripeServiceInterface
{
    public function issetShopStripeAccount(Shop $shop);
    public function connectShopStripeAccount(Shop $shop);
    public function getCheckoutLink(User $user, Shop $shop, Order $order);
}
