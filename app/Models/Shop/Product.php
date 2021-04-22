<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'price',
        'currency',
        'img',
        'category_id'
    ];

    const PRODUCTS_PAGINATION_COUNT = 10;
    const FILE_PATH = 'products';
    const CURRENCIES = [
        'usd' => '$'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function getImgFilePath(){
        // shops/{id}/products
        return Shop::FILE_PATH . '/' .$this->category->shop->id . '/' . self::FILE_PATH;
    }

    public function getImgAttribute($value){
        return '/storage/'.$value;
    }
    public function getPriceAttribute($value){
        return $value/100;
    }
    public function setPriceAttribute($value){
        $this->attributes['price'] = $value*100;
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
}
