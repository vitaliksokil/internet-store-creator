<?php


namespace App\Services\ShopService;


use App\Models\Shop\Shop;

interface ShopServiceInterface
{
    public function store(array $data);
    public function update(Shop $shop, array $data);
}
