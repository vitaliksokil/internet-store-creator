<?php

namespace App\Http\Controllers;

use App\Models\Shop\ShopType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function dashboard(){
        $shopTypes = ShopType::all();
        return view('dashboard')->with([
            'shopTypes' => $shopTypes
        ]);
    }
}
