<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
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
            'name'=>'required|max:255|unique:shops,name,'.auth()->user()->shop->id,
            'description'=>'required',
            'img'=>'',
            'address'=>'',
            'phone_number'=>'regex:~^\+[0-9]{12}$~',
            'email'=>'email',
            'shop_type_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'phone_number.regex' => __('validation.regex',['attribute'=>'phone number','message' => 'Example:+380981234567'])
        ];
    }
}
