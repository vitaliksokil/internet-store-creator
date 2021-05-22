<?php


namespace App\Services\CategoryService;


use App\Models\Shop\Category;

interface CategoryServiceInterface
{
    public function create(array $data);
    public function delete(Category $category);
    public function update(Category $category,array $data);
}
