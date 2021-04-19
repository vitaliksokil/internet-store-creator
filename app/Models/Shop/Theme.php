<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    const LIST_TYPE = 'list-type';
    const BLOCK_TYPE = 'block-type';

    public function shop(){
        return $this->hasOne(Shop::class);
    }
}
