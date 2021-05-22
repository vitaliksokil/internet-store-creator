<?php

namespace App\Http\Requests\Wishlist;

use Illuminate\Foundation\Http\FormRequest;

class AddToWishlistRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id'
        ];
    }
}
