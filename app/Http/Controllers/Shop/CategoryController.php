<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Category;
use App\Services\CategoryService\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @var CategoryServiceInterface
     */
    private $categoryService;


    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        return view('shop.categories.index',[
            'shop' => getShop(),
            'categories' => getShop()->categories,
        ]);
    }

    public function create()
    {
        return view('shop.categories.create',[
            'shop' => getShop(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $id)
    {
        //
    }

    public function edit(Category $id)
    {
        //
    }

    public function update(Request $request, Category $id)
    {
        //
    }

    public function destroy(Category $id)
    {
        //
    }
}
