<?php


namespace App\Services\ShoppingCartService;


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
}
