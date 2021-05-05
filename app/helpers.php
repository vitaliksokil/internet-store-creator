<?php

function getShop(){
    return auth()->user()->shop;
}

function shortDescription($text){
    return \Illuminate\Support\Str::limit($text, 150, '...');
}

function formatPrice($price){
    return number_format($price,2,',',' ');
}

function getSumOfProducts($products){
    $sum = 0;
    foreach ($products as $item) {
        if(isset($item->count)){
            $sum += $item->product->getAttributes()['price'] * $item->count;
        }else{
            $sum += $item->product->getAttributes()['price'];
        }
    }
    return $sum;
}

function getWishlistCount(){
    return \App\Models\Wishlist::where('user_id',auth()->user()->id)->count();
}
function getShoppingCartCount(){
    return \App\Models\ShoppingCart::where('user_id',auth()->user()->id)->count();
}
