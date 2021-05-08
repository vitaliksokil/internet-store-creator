<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryAddress\DeliveryAddressUpdateRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Warehouse;
use App\Services\DeliveryAddressService\DeliveryAddressServiceInterface;
use App\Services\NewPostApiService\NewPostApiServiceInterface;
use Illuminate\Http\Request;

class DeliveryAddressController extends Controller
{
    /**
     * @var NewPostApiServiceInterface
     */
    private $newPostApiService;
    /**
     * @var DeliveryAddressServiceInterface
     */
    private $deliveryAddressService;

    public function __construct(NewPostApiServiceInterface $newPostApiService,
                                DeliveryAddressServiceInterface $deliveryAddressService)
    {
        $this->newPostApiService = $newPostApiService;
        $this->deliveryAddressService = $deliveryAddressService;
    }

    public function editProfileDelivery(){
        $areas = Area::all();
        $user = auth()->user();
        return view('profile.pages.deliveryAddress.edit')->with([
            'user' => $user,
            'areas' => $areas,
            'deliveryAddress' => $user->delivery_address
        ]);
    }
    public function getCities($area_ref){
        $cities = City::where('area_ref',$area_ref)->get();
        return response()->json($cities);
    }
    public function getWarehouses($city_ref){
        $warehouses = Warehouse::where('city_ref',$city_ref)->get();
        return response()->json($warehouses);
    }

    public function updateDeliveryAddress(DeliveryAddressUpdateRequest $request){
        $data = $request->validated();
        $this->deliveryAddressService->createOrUpdate(auth()->user(),$data);
        return redirect()->route('profile.delivery.get')->with(['message'=>__('messages.delivery_address_update')]);
    }
}
