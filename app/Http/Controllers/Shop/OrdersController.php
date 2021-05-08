<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders = [];
        return view('shop.orders.index')->with([
            'orders' => $orders
        ]);
    }
}
