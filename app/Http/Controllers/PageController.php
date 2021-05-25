<?php

namespace App\Http\Controllers;

use App\Models\Shop\Category;
use App\Models\Shop\Product;
use App\Models\Shop\Shop;
use App\Models\Shop\ShopType;
use App\Services\FeedbacksService\FeedbackServiceInterface;
use App\Services\ProductService\ProductServiceInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * @var FeedbackServiceInterface
     */
    private $feedbackService;
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    public function __construct(FeedbackServiceInterface $feedbackService,
                                ProductServiceInterface $productService)
    {
        $this->feedbackService = $feedbackService;
        $this->productService = $productService;
    }

    public function welcome(){
        return view('pages.main-page')->with([
            'shopTypes' => ShopType::all()
        ]);
    }
    public function dashboard(){
        $shopTypes = ShopType::all();
        return view('dashboard')->with([
            'shopTypes' => $shopTypes
        ]);
    }
    public function shops(ShopType $type){
        return view('pages.shopsOfType')->with([
            'shops' => Shop::where('shop_type_id',$type->id)->paginate(12),
            'type' => $type
        ]);
    }


    public function showShop(Shop $shop){
        return view('themes.'.$shop->getTheme()->type . '.index')->with([
            'shop' => $shop,
            'categories' => $shop->categories()->paginate(Category::CATEGORIES_PAGINATION_COUNT)
        ]);
    }

    public function shopProductsByCategory(Shop $shop, Category $category){
        return view('themes.'.$shop->getTheme()->type . '.products')->with([
            'shop' => $shop,
            'products' => $category->products()->where('is_published','>',0)->where('deleted_at','=',null)
                ->orderBy('is_published','asc')->paginate(Product::PRODUCTS_PAGINATION_COUNT),
            'category' => $category,
        ]);
    }
    public function showProduct(Shop $shop, Product $product){
        return view('themes.product')->with([
            'shop' => $shop,
            'product' => $product,
            'feedbacks' => $product->getPublishedFeedbacks(),
            'categories' => $shop->categories,
            'rate' => $this->feedbackService->getProductRate($product),
            'recommendedProducts' => $this->productService->getRecommendedProducts($product)
        ]);
    }

    public function features(){
        return view('pages.features');
    }
    public function pricing(){
        return view('pages.pricing');
    }
    public function about(){
        return view('pages.about');
    }
    public function faqs(){
        return view('pages.faqs');
    }
}
