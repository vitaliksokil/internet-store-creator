<?php


namespace App\Services\ShoppingCartService;


use App\Models\User;

interface ShoppingCartServiceInterface
{
    public function getShoppingCart(User $user);
    public function store(array $data);
}
