<?php

namespace App\Http\Requests;

use Ramsey\Uuid\Uuid;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
            'name_fr' => ['bail', 'required', 'min:3'],
            'name_ar' => ['bail', 'required', 'min:3'],
           "ice" => ['bail', 'nullable', 'min:3','alpha_num'],
           "phone" => [
            'bail',
            'nullable',
            'min:10',
            'regex:'.RegexEnum::PHONE,
            Rule::unique('suppliers', 'phone')->ignore($this->supplier),
        ],
           "fax" => ['bail','nullable','min:10','max:10','regex:'.RegexEnum::PHONE,Rule::unique('suppliers', 'fax')->ignore($this->supplier)],
           "email" => ['bail','nullable','regex:'.RegexEnum::EMAIL,Rule::unique('suppliers' ,'email')->ignore($this->supplier)],
           "region_id" => ['bail', 'nullable'],
           "ville_id" => ['bail', 'nullable'],
           "secteur_id" => ['bail', 'nullable'],
           "cd_postale" => ['bail', 'nullable','numeric', 'min:3'],
           "type_supplier" => ['bail', 'required', 'min:3'],
           "fonction" => ['bail', 'nullable', 'min:3'],
           "parent_type" => ['bail', 'nullable', 'min:3'],
           "parent_id" => ['bail', 'nullable', 'min:3'],
           "address" => ['bail', 'required', 'min:3'],
           "obs" => ['bail', 'nullable', 'min:3'],


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
