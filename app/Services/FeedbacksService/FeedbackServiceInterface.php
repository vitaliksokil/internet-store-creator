<?php


namespace App\Services\FeedbacksService;


use App\Models\Shop\Feedback;
use App\Models\Shop\Product;
use App\Models\Shop\Shop;

interface FeedbackServiceInterface
{
    public function store(array $data);
    public function getProductRate(Product $product);
    public function getShopFeedbacks(Shop $shop);
    public function confirm(Feedback $feedback);
    public function delete(Feedback $feedback);

}
