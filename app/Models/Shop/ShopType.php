<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    use HasFactory;
    protected $fillable = ['*'];

    public function shops(){
        return $this->hasMany(Shop::class);
    }
}
