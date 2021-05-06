<?php


namespace App\Services\DeliveryAddressService;


use App\Models\User;

interface DeliveryAddressServiceInterface
{
    public function createOrUpdate(User $user,array $data);
}
