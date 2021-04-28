<?php


namespace App\Services\Wishlist;


use App\Models\Shop\Product;
use App\Models\ShoppingCart;
use App\Models\Wishlist;

class WishlistService implements WishlistServiceInterface
{

    public function store(array $data)
    {
        $product = Product::find($data['product_id']);
        $shop = $product->category->shop;
        $wishlist = Wishlist::where('shop_id',$shop->id)->where('product_id',$product->id)->first();
        if ($wishlist instanceof ShoppingCart){
            throw new \Exception(__('messages.item_already_in_wishlist_exception'),409);
        }
        return Wishlist::create(array_merge($data,[
            'shop_id' => $shop->id,
        ]));
    }
}
