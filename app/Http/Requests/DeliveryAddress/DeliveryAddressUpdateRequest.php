<?php

namespace App\Http\Requests\DeliveryAddress;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryAddressUpdateRequest extends FormRequest
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
            'area' => 'required|string|exists:areas,ref',
            'city' => 'required|string|exists:cities,description',
            'post_office' => 'required|string|exists:warehouses,description',
            'client_name' => 'required|string',
            'client_surname' => 'required|string',
            'client_middlename' => 'required|string',
            'client_email' => 'required|string|email',
            'client_phone_number' => 'required|string|regex:/^\+\d{12}$/',
        ];
    }
}
