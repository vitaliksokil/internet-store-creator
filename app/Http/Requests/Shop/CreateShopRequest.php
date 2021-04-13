<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class CreateShopRequest extends FormRequest
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
            'owner_id' => auth()->user()->id
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
            'name'=>'required|max:255|unique:shops',
            'description'=>'required',
            'img'=>'',
            'address'=>'',
            'phone_number'=>'regex:~^\+[0-9]{12}$~',
            'email'=>'email',
            'owner_id' => 'required|integer',
            'shop_type_id' => 'required|integer|exists:shop_types,id',
        ];
    }
    public function messages()
    {
        return [
            'phone_number.regex' => __('validation.regex',['attribute'=>'phone number','message' => 'Example:+380981234567'])
        ];
    }
}
