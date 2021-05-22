<?php


namespace App\Services\ShoppingCartService;


use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Models\Wishlist;

class ShoppingCartService implements ShoppingCartServiceInterface
{


    public function getShoppingCart(User $user)
    {
        $shoppingCart =ShoppingCart::where('user_id',$user->id)->get();
        $shoppingCart = $shoppingCart->groupBy('shop_id');
        $shoppingCart = $shoppingCart->map(function($item,$key){
            return [
                'products' => $item,
                'total_amount' => getSumOfProducts($item),
                'shop' => Shop::find($key)
            ];
        });
        return $shoppingCart;
    }

    public function getShoppingCartForOrder(User $user, $shopId){
        $shoppingCart =ShoppingCart::where('user_id',$user->id)
            ->where('shop_id',$shopId)
            ->get();
        $shoppingCart = $shoppingCart->groupBy('shop_id');
        $shoppingCart = $shoppingCart->map(function($item,$key){
            return [
                'products' => $item,
                'total_amount' => getSumOfProducts($item),
                'shop' => Shop::find($key)
            ];
        });
        return $shoppingCart->first();
    }

    public function store(array $data)
    {
        $product = Product::find($data['product_id']);
        $shop = $product->category->shop;
        $shoppingCart = ShoppingCart::where('shop_id',$shop->id)->where('product_id',$product->id)->first();
        if ($shoppingCart instanceof ShoppingCart){
            throw new \Exception(__('messages.item_already_in_shopping_cart_exception'),409);
        }
        return ShoppingCart::create(array_merge($data,[
            'shop_id' => $shop->id,
            'count' => 1
        ]));
    }

    public function moveToWishlist(ShoppingCart $shoppingCart)
    {
        $wishlist = Wishlist::where([
            ['shop_id','=',$shoppingCart->shop_id],
            ['user_id','=',$shoppingCart->user_id],
            ['product_id','=',$shoppingCart->product_id],
        ])->first();
        if(!($wishlist instanceof Wishlist)){
            $wishlist = Wishlist::create($shoppingCart->toArray());
        }
        return $shoppingCart->delete();
    }
    public function delete(ShoppingCart $shoppingCart){
        return $shoppingCart->delete();
    }

    public function deleteAll(Shop $shop)
    {
        $shoppingCarts = ShoppingCart
            ::where('shop_id',$shop->id)
            ->where('user_id',auth()->user()->id)
            ->get();
        foreach ($shoppingCarts as $shoppingCart) {
            $this->delete($shoppingCart);
        }
    }

    public function changeCount(ShoppingCart $shoppingCart, $count)
    {
        $shoppingCart->update(['count' => $count]);
        return $shoppingCart;
    }
}
