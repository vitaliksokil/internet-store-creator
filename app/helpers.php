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


function getApplicationFee($amount){
    return round($amount * config('stripe.application_fee'));
}

//STRIPE_STATIC_FEE=30
//STRIPE_DYNAMIC_FEE=0.029
function getStripeFee($amount){
    return round(($amount + config('stripe.stripe_static_fee'))/(1 - config('stripe.stripe_dynamic_fee')));
}
