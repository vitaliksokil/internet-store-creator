<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wishlist\AddToWishlistRequest;
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
}
