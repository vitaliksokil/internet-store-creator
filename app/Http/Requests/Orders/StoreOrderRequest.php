<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        $this->merge(['user_id'=>auth()->user()->id]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'products_ids' => 'required',
            'total_price' => 'required',
            'shop_id' => 'required',
            'payment_type' => 'required',

            'user_id' => 'required',
        ];
    }
}
