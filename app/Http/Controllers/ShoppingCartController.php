<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingCart\AddToShoppingCartRequest;
use App\Http\Requests\ShoppingCart\ChangeCountRequest;
use App\Http\Requests\ShoppingCart\ShoppingCartMoveToWishlistRequest;
use App\Models\Shop\Shop;
use App\Models\ShoppingCart;
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

    public function moveShoppingCartItemToWishlist(ShoppingCartMoveToWishlistRequest $request){
        $this->shoppingCartService->moveToWishlist(ShoppingCart::find($request['shopping_cart_id']));
        return redirect()->back()->with(['message'=>__('messages.shopping_cart_item_moved_to_wishlist')]);
    }

    public function destroy(ShoppingCart $shoppingCart){
        $this->shoppingCartService->delete($shoppingCart);
        return redirect()->back()->with(['message'=>__('messages.removed_shopping_cart')]);
    }
    public function destroyAll(Shop $shop){
        $this->shoppingCartService->deleteAll($shop);
        return redirect()->back()->with(['message'=>__('messages.removed_all_shopping_cart')]);
    }
    public function addCount(ChangeCountRequest $request){
        $result = $this->shoppingCartService->changeCount(ShoppingCart::find($request->validated()['shopping_cart_id']),$request->validated()['count']);
        return redirect()->back()->with(['message'=>__('messages.shopping_cart_updated')]);
    }
}
