<?php

namespace App\Http\Controllers;

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
}
