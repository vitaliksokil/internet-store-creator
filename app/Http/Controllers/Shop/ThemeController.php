<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Theme\UpdateThemeRequest;
use App\Models\Shop\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){
        return view('shop.themes.index')->with([
            'shopTheme' => getShop()->getTheme(),
            'shop' => getShop()
        ]);
    }
    public function edit(){
        return view('shop.themes.edit')->with([
            'shopTheme' => getShop()->getTheme(),
            'shop' => getShop(),
            'themes' => Theme::all()
        ]);
    }
    public function update(UpdateThemeRequest $request){
        getShop()->update(['theme_id'=>$request['theme_id']]);
        return redirect()->back()->with(['message'=>__('messages.theme_updated')]);
    }
}
