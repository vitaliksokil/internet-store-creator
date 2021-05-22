<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $result = auth()->user()->delivery_address()->exists();
        if(!$result) abort(403,"<a href='".route('profile.delivery.get')."'>You must fill up your delivery address first</a>");
        return $result;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_id' => 'required|integer|exists:shops,id',
        ];
    }
}
