<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Settings\UpdateSettingsRequest;
use App\Models\Shop\ShopSettings;
use App\Services\ShopSettingsService\ShopSettingsServiceInterface;
use Illuminate\Http\Request;

class ShopSettingsController extends Controller
{
    /**
     * @var ShopSettingsServiceInterface
     */
    private $service;

    public function __construct(ShopSettingsServiceInterface $service)
    {

        $this->service = $service;
    }

    public function index(){
        $shop = getShop();
        $settings = $shop->settings;
        return view('shop.settings.index')->with([
            'shop' => $shop,
            'settings' => $settings
        ]);
    }
    public function edit(){
        $shop = getShop();
        $settings = $shop->settings;
        if (!($settings instanceof ShopSettings)){
            $settings = new ShopSettings();
        }
        return view('shop.settings.edit')->with([
            'settings' => $settings,
            'shop' => getShop()
        ]);
    }
    public function update(UpdateSettingsRequest $request){
        $this->service->update($request->validated());
        return redirect()->route('settings.index')->with(['message'=>__('messages.settings_updated')]);
    }

}
