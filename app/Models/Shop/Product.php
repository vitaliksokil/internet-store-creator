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


    const FILE_PATH = 'products';


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
}
