<?php


namespace App\Services\Wishlist;


use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use App\Models\ShoppingCart;
use App\Models\User;
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

    public function getWishlist(User $user)
    {
        $wishlist = Wishlist::where('user_id',$user->id)->get();
        $wishlist = $wishlist->groupBy('shop_id');
        $wishlist = $wishlist->map(function($item,$key){
            return [
                'products' => $item,
                'total_amount' => getSumOfProducts($item),
                'shop' => Shop::find($key)
            ];
        });
        return $wishlist;
    }

    public function moveToShoppingCart(Wishlist $wishlist)
    {
        $shoppingCart = ShoppingCart::where([
            ['shop_id','=',$wishlist->shop_id],
            ['user_id','=',$wishlist->user_id],
            ['product_id','=',$wishlist->product_id],
        ])->first();
        if(!($shoppingCart instanceof ShoppingCart)){
            $shoppingCart = ShoppingCart::create(array_merge($wishlist->toArray()));
        }
        return $wishlist->delete();
    }

    public function delete(Wishlist $wishlist)
    {
        return $wishlist->delete();
    }

    public function moveAllToShoppingCart(Shop $shop)
    {
        $wishlists = Wishlist
            ::where('shop_id',$shop->id)
            ->where('user_id',auth()->user()->id)
            ->get();
        foreach ($wishlists as $wishlist) {
            $this->moveToShoppingCart($wishlist);
        }
    }

   public function deleteAll(Shop $shop){
       $wishlists = Wishlist
           ::where('shop_id',$shop->id)
           ->where('user_id',auth()->user()->id)
           ->get();
       foreach ($wishlists as $wishlist) {
           $this->delete($wishlist);
       }
   }

}
