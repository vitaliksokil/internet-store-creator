<?php

namespace App\Http\Requests\Shop\Settings;

use App\Models\Shop\ShopSettings;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
           'shop_id' => getShop()->id
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $settings = new ShopSettings;
        $fillable = $settings->getFillable();
        $rules = [];
        foreach ($fillable as $item){
            $rules[$item] = 'required';
        }
        return $rules;
    }
}
