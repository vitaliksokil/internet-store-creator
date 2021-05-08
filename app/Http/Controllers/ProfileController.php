<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserInfoRequest;
use App\Http\Requests\Wishlist\WishlistMoveToShoppingCartRequest;
use App\Models\Shop\Product;
use App\Services\ShoppingCartService\ShoppingCartServiceInterface;
use App\Services\UserService\UserServiceInterface;
use App\Services\Wishlist\WishlistServiceInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    private $userService;
    /**
     * @var ShoppingCartServiceInterface
     */
    private $shoppingCartService;
    /**
     * @var WishlistServiceInterface
     */
    private $wishlistService;

    public function __construct(UserServiceInterface $userService,
                                ShoppingCartServiceInterface $shoppingCartService,
                                WishlistServiceInterface $wishlistService)
    {
        $this->userService = $userService;
        $this->shoppingCartService = $shoppingCartService;
        $this->wishlistService = $wishlistService;
    }

    public function profileInfo(){
        return view('profile.pages.profile-info.profile-info')->with([
            'user' => auth()->user()
        ]);
    }
    public function profileInfoEdit(){
        return view('profile.pages.profile-info.profile-info-edit')->with([
            'user' => auth()->user()
        ]);
    }
    public function profileInfoUpdate(UpdateUserInfoRequest $request){
        $this->userService->update(auth()->user(),$request->validated());
        return redirect()->route('profile.info.edit')->with(['message'=>__('messages.shop_updated')]);
    }

    public function getShoppingCart(){
        $shoppingCart = $this->shoppingCartService->getShoppingCart(auth()->user());
        return view('profile.pages.shopping-cart.shopping-cart')->with([
            'user' => auth()->user(),
            'shoppingCart' => $shoppingCart
        ]);
    }

    public function getWishlist(){
        $wishlist = $this->wishlistService->getWishlist(auth()->user());
        return view('profile.pages.wishlist.wishlist')->with([
            'user' => auth()->user(),
            'wishlist' => $wishlist
        ]);
    }

    public function getProfileDelivery(){
        $user = auth()->user();
        return view('profile.pages.deliveryAddress.index')->with([
            'user' => $user,
            'deliveryAddress' => $user->delivery_address
        ]);
    }
}
