<?php

namespace App\Models;

use App\Models\Shop\Shop;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const CUSTOMER_TYPE = 1;
    const SELLER_TYPE = 2;
    const IMAGE_PATH = 'users';
    const TYPES = [
        'Customer' => self::CUSTOMER_TYPE,
        'Seller' => self::SELLER_TYPE,
    ];

    public function shop(){
        return $this->hasOne(Shop::class,'owner_id');
    }

    public function getImgAttribute($value)
    {
        $img =  $value;
        return Storage::exists($value) ? '/storage/'.$img : '/img/no-image.png';
    }
}
