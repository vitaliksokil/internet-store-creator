<?php

namespace App\Http\Requests\Feedbacks;

use Illuminate\Foundation\Http\FormRequest;

class CreateFeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required',
            'rate' => 'required|integer',
            'user_id' => 'required',
            'product_id' => 'required',

        ];
    }
}
