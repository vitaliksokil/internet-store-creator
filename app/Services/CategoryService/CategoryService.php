<?php


namespace App\Services\CategoryService;


use App\Models\Shop\Category;
use App\Services\FileUploaderService\FileUploaderServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var FileUploaderServiceInterface
     */
    private $fileUploaderService;

    public function __construct(FileUploaderServiceInterface $fileUploaderService)
    {
        $this->fileUploaderService = $fileUploaderService;
    }

    public function create(array $data)
    {
        $category = Category::create($data);
        if(isset($data['img'])){
            $category->img = $this->fileUploaderService->uploadImg($category,$data['img'],$category->getImgFilePath());
            $category->save();
        }
        return $category;
    }

    public function delete(Category $category)
    {
//        if($category->img){
//            $this->fileUploaderService->deleteImg($category->getAttributes()['img']);
//        }
        $category->delete();
    }

    public function update(Category $category,array $data){
        if(isset($data['img'])){
            $category->img = $this->fileUploaderService->uploadImg($category,$data['img'],$category->getImgFilePath());
            $category->save();
            unset($data['img']);
        }
        $category->update($data);
        return $category;
    }
}

