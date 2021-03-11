<?php


namespace App\Services\FileUploaderService;


use App\Models\Shop\Shop;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploaderService implements FileUploaderServiceInterface
{
    public function uploadShopAvatar(Shop $shop, UploadedFile $file)
    {
        if ($shop->img){
            Storage::delete($shop->getAttributes()['img']);
        }
        return Storage::putFile($shop->getAvatarsFilePath(), $file);
    }
}
