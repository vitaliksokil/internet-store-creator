<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wishlist\AddToWishlistRequest;
use App\Http\Requests\Wishlist\MoveAllToShoppingCartRequest;
use App\Http\Requests\Wishlist\WishlistMoveToShoppingCartRequest;
use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use App\Models\Wishlist;
use App\Services\Wishlist\WishlistServiceInterface;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * @var WishlistServiceInterface
     */
    private $wishlistService;

    public function __construct(WishlistServiceInterface $wishlistService)
    {
        $this->wishlistService = $wishlistService;
    }

    public function store(AddToWishlistRequest $request){
        $this->wishlistService->store($request->validated());
        return response()->json([
            'message' => __('messages.new_item_in_wishlist')
        ]);
    }
    public function destroy(Wishlist $wishlist){
       $this->wishlistService->delete($wishlist);
       return redirect()->back()->with(['message'=>__('messages.removed_wishlist')]);
    }
    public function destroyAll(Shop $shop){
       $this->wishlistService->deleteAll($shop);
       return redirect()->back()->with(['message'=>__('messages.removed_all_wishlist')]);
    }

    public function moveWishlistItemToShoppingCart(WishlistMoveToShoppingCartRequest $request){
        $this->wishlistService->moveToShoppingCart(Wishlist::find($request['wishlist_id']));
        return redirect()->back()->with(['message'=>__('messages.wishlist_item_moved_to_shopping_cart')]);
    }
    public function moveAllToShoppingCart(MoveAllToShoppingCartRequest $request){
        $this->wishlistService->moveAllToShoppingCart(Shop::find($request['shop_id']));
        return redirect()->back()->with(['message'=>__('messages.wishlist_all_moved_to_shopping_cart')]);
    }
}
