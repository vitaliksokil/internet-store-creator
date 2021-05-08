<?php


namespace App\Services\DeliveryAddressService;


use App\Models\Area;
use App\Models\DeliveryAddress;
use App\Models\User;

class DeliveryAddressService implements DeliveryAddressServiceInterface
{

    public function createOrUpdate(User $user, array $data)
    {
        $area = Area::where('ref',$data['area'])->firstOrFail();
        $data['area'] = $area->description;
        $insertData = array_merge($data,['user_id' => $user->id]);
        if($user->delivery_address()->exists()){
            // update
            return $user->delivery_address()->update($insertData);
        }else{
            // create
            return DeliveryAddress::create($insertData);
        }
    }
}
