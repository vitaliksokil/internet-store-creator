<?php

namespace App\Models;

use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'total_price',
        'payment_method_type',
        'is_paid',
        'status'
    ];

    const ORDERS_PAGINATION_COUNT = 10;
    const STATUS_NOT_CONFIRMED = false;
    const STATUS_CONFIRMED = true;

    const ONLINE_PAYMENT_TYPE = 1;
    const OFFLINE_PAYMENT_TYPE = 2;

    const PAYMENT_TYPES = [
        1 => '<i class="fas fa-circle" style="color: green"></i> ONLINE',
        2 => '<i class="fas fa-circle"  style="color: red"></i> OFFLINE'
    ];
    const IS_PAID_ICONS = [
        0 => '<i class="fas fa-times" style="color: red"></i>',
        1 => '<i class="fas fa-check" style="color: green"></i>'
    ];
    const STATUS_ICONS = [
        0 => '<i class="fas fa-times" style="color: red"></i>',
        1 => '<i class="fas fa-check" style="color: green"></i>'
    ];

    public function order_products(){
        return $this->hasMany(OrderProduct::class);
    }
    public function products(){
        return $this->hasManyThrough(Product::class,OrderProduct::class,'product_id','id');
    }
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    public function getTotalPriceAttribute($value){
        return $value / 100;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
