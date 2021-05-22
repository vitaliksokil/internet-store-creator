<?php


namespace App\Services\FileUploaderService;


use App\Models\Shop\Category;
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

    public function uploadImg($entity, UploadedFile $file, string $path)
    {
        if ($entity->img){
            Storage::delete($entity->getAttributes()['img']);
        }
        return Storage::putFile($path, $file);
    }

    public function deleteImg(string $img){
        Storage::delete($img);
    }
}
