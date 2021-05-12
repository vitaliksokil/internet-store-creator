<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'rate',
        'user_id',
        'product_id',
    ];

    const FEEDBACKS_PAGINATION_COUNT = 10;

    const UNPUBLISHED = 0;
    const PUBLISHED = 1;

    const STATUS_ICONS = [
        0 => '<i class="fas fa-times" style="color: red"></i>',
        1 => '<i class="fas fa-check" style="color: green"></i>'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function shop(){
        return $this->product->category->shop;
    }
}
