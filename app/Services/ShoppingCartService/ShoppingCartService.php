<?php


namespace App\Services\ShoppingCartService;


use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use App\Models\ShoppingCart;
use App\Models\User;

class ShoppingCartService implements ShoppingCartServiceInterface
{

    private function getSumOfProducts(array $products){
        $sum = 0;
        foreach ($products as $item) {
            $sum += $item->getAttributes()['price'];
        }
        return $sum;
    }
    public function getShoppingCart(User $user)
    {
        $shoppingCart =ShoppingCart::where('user_id',$user->id)->get();
        $newShoppingCart = [];
        $shop = $shoppingCart->first()->shop;
        foreach ($shoppingCart as $key=>$item) {
            if ($item->shop_id == $shop->id){
                $products[] = $item->product;
            }else{
                $newShoppingCart[$shop->id] = [
                    'shop' => $shop,
                    'products' => $products,
                    'total_price' => $this->getSumOfProducts($products)
                ];
                $products = [];
                $products[] = $item->product;
                $shop = $item->shop;
                $newShoppingCart[$shop->id] = [
                    'shop' => $shop,
                    'products' => $products,
                    'total_price' => $this->getSumOfProducts($products)

                ];
            }
        }

        dd($newShoppingCart);
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
