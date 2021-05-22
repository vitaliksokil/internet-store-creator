<?php
return [
    'stripe_key' => env('STRIPE_KEY'),
    'stripe_secret' => env('STRIPE_SECRET'),
    'application_fee' => env('APPLICATION_FEE',0.015),
    'stripe_static_fee' => env('STRIPE_STATIC_FEE',30),
    'stripe_dynamic_fee' => env('STRIPE_DYNAMIC_FEE',0.029)
];
