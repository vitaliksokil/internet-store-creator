<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Models\Order;
use App\Services\OrderService\OrderServiceInterface;
use App\Services\ShoppingCartService\ShoppingCartServiceInterface;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    /**
     * @var ShoppingCartServiceInterface
     */
    private $shoppingCartService;
    /**
     * @var OrderServiceInterface
     */
    private $orderService;

    public function __construct(ShoppingCartServiceInterface $shoppingCartService,
                                OrderServiceInterface $orderService)
    {
        $this->shoppingCartService = $shoppingCartService;
        $this->orderService = $orderService;
    }

    public function index(){
        $orders = $this->orderService->getUserOrders(auth()->user());
        return view('profile.pages.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function store(StoreOrderRequest $request){
        $result = $this->orderService->store($request->validated());
        return $result;
    }


    public function create(CreateOrderRequest $request){
        $shopId = $request->validated()['shop_id'];
        $shoppingCart = $this->shoppingCartService->getShoppingCartForOrder(auth()->user(),$shopId);
        return view('profile.pages.orders.create')->with([
            'item' => $shoppingCart,
        ]);
    }

    public function show(Order $order){
        $orderShow = $this->orderService->getShowOrder($order);
        return view('profile.pages.orders.show')->with([
            'item' => $orderShow
        ]);
    }

    public function paidSuccess(Order $order){
        $this->orderService->paymentSuccess($order);
        session()->flash('message',__('messages.order_payment_success'));
        return redirect()->route('profile.orders.show',['order'=>$order]);
    }
    public function paidCanceled(Order $order){
//        $this->orderService->paymentSuccess($order);
        session()->flash('error_403',__('messages.order_payment_canceled'));
        return redirect()->route('profile.orders.show',['order'=>$order]);
    }
}
