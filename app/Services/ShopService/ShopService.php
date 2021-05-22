<?php


namespace App\Services\ShopService;


use App\Models\Shop\Shop;
use App\Services\FileUploaderService\FileUploaderServiceInterface;
use Illuminate\Support\Str;

class ShopService implements ShopServiceInterface
{
    /**
     * @var FileUploaderServiceInterface
     */
    private $fileUploaderService;

    public function __construct(FileUploaderServiceInterface $fileUploaderService)
    {
        $this->fileUploaderService = $fileUploaderService;
    }

    public function store(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        $shop = Shop::create($data);
        $shop->settings()->create();
        if (isset($data['img'])){
            $shop->img = $this->fileUploaderService->uploadShopAvatar($shop,$data['img']);
            $shop->save();
        }
        return $shop;
    }

    public function update(Shop $shop, array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        if (isset($data['img'])){
            $shop->img = $this->fileUploaderService->uploadShopAvatar($shop,$data['img']);
            $shop->save();
            unset($data['img']);
        }
        $shop->update($data);
        return $shop;
    }
}
