<?php


namespace App\Services\ShopSettingsService;


use App\Models\Shop\ShopSettings;

class ShopSettingsService implements ShopSettingsServiceInterface
{

    public function update(array $data)
    {
        $shopSettings = getShop()->settings;
        if ($shopSettings instanceof ShopSettings){
            $shopSettings->update($data);
            return $shopSettings;
        }else{
            return ShopSettings::create($data);
        }
    }
}
