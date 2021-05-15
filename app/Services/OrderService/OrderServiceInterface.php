<?php


namespace App\Services\OrderService;


use App\Models\Order;
use App\Models\Shop\Shop;
use App\Models\User;

interface OrderServiceInterface
{
    public function store($data);
    public function getUserOrders(User $user);
    public function getShowOrder(Order $order);
    public function getShopOrders(Shop $shop);
    public function delete(Order $order);
    public function confirm(Order $order);
    public function paymentSuccess(Order $order);
}
