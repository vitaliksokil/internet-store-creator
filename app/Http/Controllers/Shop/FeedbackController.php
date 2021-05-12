<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedbacks\CreateFeedbackRequest;
use App\Models\Shop\Feedback;
use App\Services\FeedbacksService\FeedbackServiceInterface;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * @var FeedbackServiceInterface
     */
    private $service;

    public function __construct(FeedbackServiceInterface $service)
    {
        $this->service = $service;
    }

    public function store(CreateFeedbackRequest $request)
    {
        $this->service->store($request->validated());
        return response()->json([
            'message' => __('messages.feedback_created')
        ]);
    }

    public function index()
    {
        $feedbacks = $this->service->getShopFeedbacks(getShop());
        return view('shop.feedbacks.index')->with([
            'feedbacks' => $feedbacks
        ]);
    }

    public function show(Feedback $feedback)
    {
        return view('shop.feedbacks.show')->with([
            'feedback' => $feedback
        ]);
    }

    public function delete(Feedback $feedback)
    {

    }

    public function confirm(Feedback $feedback)
    {

    }
}
