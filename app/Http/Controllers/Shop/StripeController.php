<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\StripeService\StripeServiceInterface;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    /**
     * @var StripeServiceInterface
     */
    private $stripeService;

    public function __construct(StripeServiceInterface $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function index(){
        $shop = getShop();
        $stripeConnectedEmail = $this->stripeService->issetShopStripeAccount($shop);
        return view('shop.stripe.index')->with([
            'shop' => $shop,
            'stripeConnectedEmail' => $stripeConnectedEmail
        ]);
    }

    public function connect(){
        $shop = getShop();
        $link = $this->stripeService->connectShopStripeAccount($shop);
        return redirect()->to($link->url);
    }

}

