<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
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
            'products' => getShop()->products,
        ]);
    }

    public function create()
    {
        return view('shop.products.create',[
            'shop' => getShop(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $id)
    {
        //
    }

    public function edit(Product $id)
    {
        //
    }

    public function update(Request $request, Product $id)
    {
        //
    }
    public function destroy(Product $id)
    {
        //
    }
}
