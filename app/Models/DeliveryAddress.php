<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'area',
        'city',
        'post_office',
        'client_name',
        'client_surname',
        'client_middlename',
        'client_email',
        'client_phone_number',
    ];
}
