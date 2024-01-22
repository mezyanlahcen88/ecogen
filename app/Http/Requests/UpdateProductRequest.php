<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'product_code' => ['bail', 'required',Rule::unique('products','product_code')->ignore($this->product)],
            'name_fr' =>  ['bail', 'required', 'min:3'],
            'name_ar' =>  ['bail', 'required', 'min:3'],

            'category_id' =>  ['bail', 'required'],
            'scategory_id' =>  ['bail', 'required'],
            'buy_price' =>  ['bail', 'required'],
            'price_unit' =>  ['bail', 'required'],
            'price_gros' =>  ['bail', 'required'],
            'price_reseller' =>  ['bail', 'required'],
            'latest_price' =>  ['bail', 'required'],
            'remise' =>  ['bail', 'required'],
            'tva' =>  ['bail', 'required'],
            'min_stock' =>  ['bail', 'required'],
            'unite' =>  ['bail', 'required'],
            'warehouse_id' =>  ['bail', 'required'],
            'bar_code' =>  ['bail', 'nullable'],
            'stockable' =>  ['bail', 'nullable'],
            // 'archive' =>  ['bail', 'required'],
            'brand_id' =>  ['bail', 'required'],
           //  'picture' =>  ['bail', 'required'],
        ];
    }
    public function messages()
    {
        return [
            'name_ar.required' => 'المرجو إدخال المعلومات',
        ];
    }
}
