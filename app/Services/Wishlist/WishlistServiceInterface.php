<?php


namespace App\Services\Wishlist;


use App\Models\User;

interface WishlistServiceInterface
{
    public function store(array $data);
    public function getWishlist(User $user);
}
