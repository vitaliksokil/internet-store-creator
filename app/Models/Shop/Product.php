<?php

namespace App\Models\Shop;

use App\Models\ShoppingCart;
use App\Models\Wishlist;
use App\Services\FeedbacksService\FeedbackServiceInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'title',
        'description',
        'price',
        'img',
        'category_id',
        'is_published'
    ];

    const PRODUCTS_PAGINATION_COUNT = 10;
    const FILE_PATH = 'products';


    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 0;
    const STATUS_NOT_AVAILABLE = 2;
    const IS_PUBLISHED_ICONS = [
        0 => 'Не опубліковано <i class="fas fa-times" style="color: red"></i>',
        1 => 'Опубліковано <i class="fas fa-check" style="color: green"></i>',
        2 => 'Немає в наявності'
    ];

    public function category(){
        return $this->belongsTo(Category::class)->withTrashed();
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
    public function getRate(){
        $feedbackService = app()->make(FeedbackServiceInterface::class);
        return $feedbackService->getProductRate($this);
    }
}
