<?php


namespace App\Services\ProductService;


use App\Models\Shop\Product;

interface ProductServiceInterface
{
    public function store(array $data);
    public function delete(Product $product);
    public function update(Product $product,array $data);
}
