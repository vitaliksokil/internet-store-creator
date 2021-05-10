<?php


namespace App\Services\OrderService;


use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use App\Models\ShoppingCart;
use App\Models\User;

class OrderService implements OrderServiceInterface
{

    public function store($data)
    {
        $order = Order::create($data);
        $shoppingCarts = ShoppingCart::whereIn('id',json_decode($data['products_ids']))->get();
        foreach ($shoppingCarts as $shoppingCart){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $shoppingCart->product->id,
                'count' => $shoppingCart->count,
            ]);
            $shoppingCart->delete();
        }
        switch ($data['payment_type']){
            case Order::ONLINE_PAYMENT_TYPE:
                // todo create checkout session!
                break;
            case Order::OFFLINE_PAYMENT_TYPE:
                break;
        }
    }

    public function getUserOrders(User $user)
    {
        return Order::where('user_id',$user->id)->orderBy('id','desc')->paginate(Order::ORDERS_PAGINATION_COUNT);
    }

    public function getShowOrder(Order $order)
    {
        return [
            'products' => $order->order_products,
            'total_amount' => $order->getAttributes()['total_price'],
            'shop' => Shop::find($order->shop_id),
            'order' => $order
        ];
    }

    public function getShopOrders(Shop $shop)
    {
        return Order::where('shop_id',$shop->id)->orderBy('id','desc')->paginate(Order::ORDERS_PAGINATION_COUNT);

    }
}
