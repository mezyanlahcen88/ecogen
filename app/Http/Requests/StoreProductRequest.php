<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
             'product_code' => ['bail', 'required', 'min:3',Rule::unique('products', 'product_code')->ignore($this)],
             'name_fr' =>  ['bail', 'required', 'min:3'],
             'scategory_id' =>  ['bail', 'required', 'min:3'],
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
             'bar_code' =>  ['bail', 'required'],
            //  'stockable' =>  ['bail', 'nullable'],
            //  'archive' =>  ['bail', 'required',],
             'brand_id' =>  ['bail', 'required'],
             'name_ar' =>  ['bail', 'required', 'min:3'],
             'picture' =>  ['bail', 'required'],

        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => 'المرجو إدخال المعلومات',
        ];
    }
}
?>
