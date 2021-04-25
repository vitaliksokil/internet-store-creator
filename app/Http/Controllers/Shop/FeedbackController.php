<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedbacks\CreateFeedbackRequest;
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

    public function store(CreateFeedbackRequest $request){
        $this->service->store($request->validated());
        return response()->json([
            'message' => __('messages.feedback_created')
        ]);
    }
}
