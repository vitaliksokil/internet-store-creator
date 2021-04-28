<?php


namespace App\Services\FeedbacksService;


use App\Models\Shop\Product;

interface FeedbackServiceInterface
{
    public function store(array $data);
    public function getProductRate(Product $product);

}
