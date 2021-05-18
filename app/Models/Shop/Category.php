<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'img',
        'shop_id'
    ];

    const CATEGORIES_PAGINATION_COUNT = 10;
    const FILE_PATH = 'categories';

    public function getImgFilePath(){
        // shops/{id}/categories
        return Shop::FILE_PATH . '/' .$this->shop->id . '/' . self::FILE_PATH;
    }

    public function getImgAttribute($value){
        return '/storage/'.$value;
    }

    public function products(){
        return $this->hasMany(Product::class)->withTrashed();
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
