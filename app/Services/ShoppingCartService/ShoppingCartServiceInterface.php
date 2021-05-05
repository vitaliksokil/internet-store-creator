<?php


namespace App\Services\ShoppingCartService;


use App\Models\Shop\Shop;
use App\Models\ShoppingCart;
use App\Models\User;

interface ShoppingCartServiceInterface
{
    public function getShoppingCart(User $user);
    public function store(array $data);
    public function moveToWishlist(ShoppingCart $shoppingCart);
    public function delete(ShoppingCart $shoppingCart);
    public function deleteAll(Shop $shop);
    public function changeCount(ShoppingCart $shoppingCart, $count);
}
