<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'name',
        'image_preview',
        'type'
    ];
    use HasFactory;

    const LIST_TYPE = 'list-type';
    const BLOCK_TYPE = 'block-type';

    public function shops(){
        return $this->hasMany(Shop::class);
    }
}
