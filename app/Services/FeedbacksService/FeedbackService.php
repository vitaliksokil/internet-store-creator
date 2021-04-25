<?php


namespace App\Services\FeedbacksService;


use App\Models\Shop\Feedback;

class FeedbackService implements FeedbackServiceInterface
{

    public function store(array $data)
    {
        return Feedback::create($data);
    }
}
