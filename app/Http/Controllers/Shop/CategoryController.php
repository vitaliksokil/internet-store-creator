<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Categories\CreateCategoryRequest;
use App\Http\Requests\Shop\Categories\UpdateCategoryRequest;
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
    private function redirectAfterAction($message=''){
        return redirect()->route('category.index')->with(['message'=>$message]);
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

    public function store(CreateCategoryRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->create($data);
        return $this->redirectAfterAction(__('messages.category_created'));
    }

//    public function show(Category $id)
//    {
//        //
//    }

    public function edit(Category $id)
    {
        return view('shop.categories.edit',[
            'category' => $id,
            'shop' => getShop()
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $id)
    {
        $data = $request->validated();
        $this->categoryService->update($id,$data);
        return $this->redirectAfterAction(__('messages.category_updated'));
    }

    public function destroy(Category $id)
    {
        $this->categoryService->delete($id);
        return $this->redirectAfterAction(__('messages.category_deleted'));
    }
}
