<?php


namespace App\Services\FileUploaderService;


use App\Models\Shop\Category;
use App\Models\Shop\Shop;
use Illuminate\Http\UploadedFile;

interface FileUploaderServiceInterface
{
    public function uploadShopAvatar(Shop $shop, UploadedFile $file);
    public function uploadImg($entity, UploadedFile $file, string $path);
    public function deleteImg(string $img);
}
