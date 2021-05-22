<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\UpdateOrderRequest;
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
    public function edit(Order $order){
        return view('shop.orders.edit')->with([
            'order' => $order
        ]);
    }

    public function update(UpdateOrderRequest $request, Order $order){
        $this->orderService->update($order,$request->validated());
        return redirect()->route('shop.orders.index')->with(['message'=>__('messages.order_updated')]);
    }

    public function delete(Order $order){
        $this->orderService->delete($order);
        return redirect()->route('shop.orders.index')->with(['message'=>__('messages.order_deleted')]);
    }

    public function confirm(Order $order){
        $this->orderService->confirm($order);
        return redirect()->back()->with(['message'=>__('messages.order_confirmed')]);
    }
}
