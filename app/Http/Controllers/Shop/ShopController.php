<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\CreateShopRequest;
use App\Http\Requests\Shop\UpdateShopRequest;
use App\Services\ShopService\ShopServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * @var ShopServiceInterface
     */
    private $shopService;

    public function __construct(ShopServiceInterface $shopService)
    {
        $this->shopService = $shopService;
    }

    public function index(){
       return view('shop.pages.index',[
           'shop' => auth()->user()->shop
       ]);
    }
    public function store(CreateShopRequest $request){
        $data = $request->validated();
        $this->shopService->store($data);
        return redirect()->route('shop.index');
    }
    public function edit(){
        return view('shop.pages.edit',[
            'shop' => auth()->user()->shop
        ]);
    }
    public function update(UpdateShopRequest $request){
        $data = $request->validated();
        $this->shopService->update(auth()->user()->shop,$data);
        return redirect()->route('shop.edit')->with(['message'=>__('messages.shop_updated')]);
    }
}
