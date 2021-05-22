<?php

namespace App\Http\Requests\Wishlist;

use Illuminate\Foundation\Http\FormRequest;

class WishlistMoveToShoppingCartRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'wishlist_id' => 'required|integer|exists:wishlists,id',
        ];
    }
}
