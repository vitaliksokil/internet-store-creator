<?php


namespace App\Services\ProductService;


use App\Models\Shop\Feedback;
use App\Models\Shop\Product;
use App\Models\ShoppingCart;
use App\Models\Wishlist;
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

    public function delete(Product $product)
    {
        ShoppingCart::where('product_id',$product->id)->delete();
        Wishlist::where('product_id',$product->id)->delete();
        Feedback::where('product_id',$product->id)->delete();
        $product->delete();
    }
    public function update(Product $product,array $data){
        if(isset($data['img'])){
            $product->img = $this->fileUploaderService->uploadImg($product,$data['img'],$product->getImgFilePath());
            $product->save();
            unset($data['img']);
        }
        $product->update($data);
        return $product;
    }

    public function getRecommendedProducts(Product $product)
    {
        $recommendedProducts = Product::where('category_id',$product->category_id)->get();
        $recommendedProductsCount = $recommendedProducts->count();
        if ($recommendedProductsCount < 7){
            $moreProducts = Product::inRandomOrder()
                ->whereHas('category',function ($q) use ($product){
                    $q->where('shop_id',$product->category->shop_id)
                    ->where('id','!=',$product->category_id);
                })
                ->limit(7-$recommendedProductsCount)
                ->get();
            $recommendedProducts = $recommendedProducts->merge($moreProducts);
        }elseif($recommendedProductsCount > 7){
            $recommendedProducts = $recommendedProducts->random(7);
        }

        return $recommendedProducts;
    }
}
