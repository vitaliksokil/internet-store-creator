<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService\OrderServiceInterface;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    /**
     * @var OrderServiceInterface
     */
    private $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(){
        $orders = $this->orderService->getShopOrders(getShop());
        return view('shop.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function show(Order $order){
        $orderShow = $this->orderService->getShowOrder($order);
        return view('shop.orders.show')->with([
            'item' => $orderShow
        ]);
    }
}
