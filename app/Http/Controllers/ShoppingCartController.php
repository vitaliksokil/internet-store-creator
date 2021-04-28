<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingCart\AddToShoppingCartRequest;
use App\Services\ShoppingCartService\ShoppingCartServiceInterface;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * @var ShoppingCartServiceInterface
     */
    private $shoppingCartService;

    public function __construct(ShoppingCartServiceInterface $shoppingCartService)
    {
        $this->shoppingCartService = $shoppingCartService;
    }


    public function store(AddToShoppingCartRequest $request){
        $this->shoppingCartService->store($request->validated());
        return response()->json([
            'message' => __('messages.new_item_in_shopping_cart')
        ]);
    }
}
