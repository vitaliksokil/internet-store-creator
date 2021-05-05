<?php

namespace App\Models;

use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_id',
        'user_id',
        'product_id',
        'count',
    ];
    protected $attributes = [
        'count' => 1,
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
