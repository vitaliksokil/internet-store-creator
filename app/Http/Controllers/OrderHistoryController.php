<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Models\Order;
use App\Services\ShoppingCartService\ShoppingCartServiceInterface;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    /**
     * @var ShoppingCartServiceInterface
     */
    private $shoppingCartService;

    public function __construct(ShoppingCartServiceInterface $shoppingCartService)
    {
        $this->shoppingCartService = $shoppingCartService;
    }

    public function index(){
        $orders = Order::all();
        dd($orders);
        return view('shop.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function store(){

    }
    public function create(CreateOrderRequest $request){
        $shopId = $request->validated()['shop_id'];
        $shoppingCart = $this->shoppingCartService->getShoppingCartForOrder(auth()->user(),$shopId);
        return view('profile.pages.orders.create')->with([
            'item' => $shoppingCart
        ]);
    }
}
