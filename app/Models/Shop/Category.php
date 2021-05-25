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

    const CATEGORIES_PAGINATION_COUNT = 12;
    const FILE_PATH = 'categories';

    public function getImgFilePath(){
        // shops/{id}/categories
        return Shop::FILE_PATH . '/' .$this->shop->id . '/' . self::FILE_PATH;
    }

    public function getImgAttribute($value){
        return '/storage/'.$value;
    }

    public function products(){
        return $this->hasMany(Product::class)->withTrashed()->where('is_published','>',\App\Models\Shop\Product::STATUS_UNPUBLISHED);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
