<?php

namespace App\Http\Controllers;

use App\Models\Shop\Shop;
use App\Models\Shop\ShopType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
        return view('pages.main-page')->with([
            'shopTypes' => ShopType::all()
        ]);
    }
    public function dashboard(){
        $shopTypes = ShopType::all();
        return view('dashboard')->with([
            'shopTypes' => $shopTypes
        ]);
    }
    public function shops(ShopType $type){
        return view('pages.shopsOfType')->with([
            'shops' => Shop::where('shop_type_id',$type->id)->get(),
            'type' => $type
        ]);
    }
}
