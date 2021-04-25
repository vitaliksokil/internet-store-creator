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

    const UNPUBLISHED = 0;
    const PUBLISHED = 1;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
