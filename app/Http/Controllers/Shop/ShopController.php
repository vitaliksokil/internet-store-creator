<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\CreateShopRequest;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        dd(1);
    }
    public function store(CreateShopRequest $request){
        dd($request->validated());
    }
}
