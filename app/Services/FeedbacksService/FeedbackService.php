<?php


namespace App\Services\FeedbacksService;


use App\Models\Shop\Feedback;
use App\Models\Shop\Product;
use App\Models\Shop\Shop;

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

    public function getShopFeedbacks(Shop $shop){
        $feedbacks = Feedback::whereHas('product',function($q) use($shop){
            $q->whereHas('category',function($q) use($shop){
                $q->where('shop_id',$shop->id);
            });
        })->orderBy('id','desc')->paginate(Feedback::FEEDBACKS_PAGINATION_COUNT);
        return $feedbacks;
    }

    public function confirm(Feedback $feedback)
    {
        $feedback->update(['status' => Feedback::PUBLISHED]);
        return $feedback;
    }

    public function delete(Feedback $feedback)
    {
        return $feedback->delete();
    }
}
