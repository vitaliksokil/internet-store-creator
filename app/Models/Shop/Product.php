<?php

namespace App\Models\Shop;

use App\Models\ShoppingCart;
use App\Models\Wishlist;
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
    public function getPublishedFeedbacks(){
        return $this->feedbacks()->where('status', Feedback::PUBLISHED)->get();
    }

    public function isInShoppingCart(){
        $user = auth()->user();
        $shoppingCart = ShoppingCart::where('product_id',$this->id)->where('user_id',$user->id)->first();
        return $shoppingCart instanceof ShoppingCart;
    }
    public function isInWishlist(){
        $user = auth()->user();
        return Wishlist::where('product_id',$this->id)
                ->where('user_id',$user->id)
                ->first() instanceof Wishlist;
    }
    public function __toString()
    {
        return $this->title;
    }
    public function getPriceFormat(){
        return number_format($this->price,2,',',' ');
    }
}
