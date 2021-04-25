<?php

namespace App\Http\Controllers;

use App\Models\Shop\Category;
use App\Models\Shop\Product;
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


    public function showShop(Shop $shop){
        return view('themes.'.$shop->getTheme()->type . '.index')->with([
            'shop' => $shop,
            'categories' => $shop->categories
        ]);
    }

    public function shopProductsByCategory(Shop $shop, Category $category){
        return view('themes.'.$shop->getTheme()->type . '.products')->with([
            'shop' => $shop,
            'products' => $category->products
        ]);
    }
    public function showProduct(Shop $shop, Product $product){
        return view('themes.'.$shop->getTheme()->type . '.product')->with([
            'shop' => $shop,
            'product' => $product,
            'feedbacks' => $product->getPublishedFeedbacks()
        ]);
    }
}
