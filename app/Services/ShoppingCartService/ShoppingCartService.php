<?php


namespace App\Services\ShoppingCartService;


use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use App\Models\ShoppingCart;
use App\Models\User;

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
}
