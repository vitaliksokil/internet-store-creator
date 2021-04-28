<?php


namespace App\Services\FeedbacksService;


use App\Models\Shop\Feedback;
use App\Models\Shop\Product;

class FeedbackService implements FeedbackServiceInterface
{

    public function store(array $data)
    {
        return Feedback::create($data);
    }
    public function getProductRate(Product $product){
        $rate = Feedback::where([
            ['product_id','=',$product->id],
            ['status','=',Feedback::PUBLISHED],
        ])->get()->avg('rate');
        return round($rate);
    }
}
