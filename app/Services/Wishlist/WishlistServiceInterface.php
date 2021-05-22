<?php


namespace App\Services\Wishlist;


use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use App\Models\User;
use App\Models\Wishlist;

interface WishlistServiceInterface
{
    public function store(array $data);
    public function getWishlist(User $user);
    public function moveToShoppingCart(Wishlist $wishlist);
    public function moveAllToShoppingCart(Shop $shop);
    public function delete(Wishlist $wishlist);
    public function deleteAll(Shop $shop);
}

