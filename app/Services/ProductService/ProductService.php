<?php


namespace App\Services\ProductService;


use App\Models\Shop\Product;
use App\Services\FileUploaderService\FileUploaderServiceInterface;

class ProductService implements ProductServiceInterface
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
        $product = Product::create($data);
        if(isset($data['img'])){
            $product->img = $this->fileUploaderService->uploadImg($product,$data['img'],$product->getImgFilePath());
            $product->save();
        }
        return $product;

    }
}
