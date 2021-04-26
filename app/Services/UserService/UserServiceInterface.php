<?php


namespace App\Services\UserService;


use App\Models\User;

interface UserServiceInterface
{
    public function update(User $user,array $data);
}
