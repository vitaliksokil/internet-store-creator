<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Products\CreateProductRequest;
use App\Http\Requests\Shop\Products\UpdateProductRequest;
use App\Models\Shop\Category;
use App\Models\Shop\Product;
use App\Services\CategoryService\CategoryServiceInterface;
use App\Services\ProductService\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('shop.products.index',[
            'shop' => getShop(),
            'categories' => getShop()->categories()->paginate(Category::CATEGORIES_PAGINATION_COUNT),
        ]);
    }

    public function create(Category $category)
    {
        return view('shop.products.create',[
            'shop' => getShop(),
            'category' => $category
        ]);
    }

    public function productsByCategory(Category $category){
        return view('shop.products.productsByCategory',[
            'shop' => getShop(),
            'products' => $category->products()->paginate(Product::PRODUCTS_PAGINATION_COUNT),
            'category' => $category
        ]);
    }

    private function redirectAfterAction($message=''){
        return redirect()->route('product.index')->with(['message'=>$message]);
    }

    public function store(CreateProductRequest $request,Category $category)
    {
        $this->productService->store(array_merge($request->validated(),['category_id'=>$category->id]));
        return redirect()->route('category.products',['category'=>$category])->with(['message'=>__('messages.product_created')]);
    }

//    public function show(Product $id)
//    {
//        //
//    }

    public function edit(Product $product)
    {
        return view('shop.products.edit',[
            'product' => $product,
            'shop' => getShop()
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product = $this->productService->update($product, $data);
        return redirect()->route('category.products',['category'=>$product->category])->with(['message'=>__('messages.product_updated')]);
    }

    public function destroy(Product $product)
    {
        $category = $product->category;
        $this->productService->delete($product);
        return redirect()->route('category.products',['category'=>$category])->with(['message'=>__('messages.product_deleted')]);
    }
}
