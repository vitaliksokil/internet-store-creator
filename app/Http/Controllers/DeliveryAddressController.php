<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Services\NewPostApiService\NewPostApiServiceInterface;
use Illuminate\Http\Request;

class DeliveryAddressController extends Controller
{
    /**
     * @var NewPostApiServiceInterface
     */
    private $newPostApiService;

    public function __construct(NewPostApiServiceInterface $newPostApiService)
    {
        $this->newPostApiService = $newPostApiService;
    }

    public function editProfileDelivery(){
        $areas = Area::all();
        return view('profile.pages.deliveryAddress.edit')->with([
            'user' => auth()->user(),
            'areas' => $areas
        ]);
    }
    public function getCities($area_ref){
        $cities = City::where('area_ref',$area_ref)->get();
        return response()->json($cities);
    }
}
