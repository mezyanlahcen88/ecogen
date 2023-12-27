<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDevisRequest extends FormRequest
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
             // 'name' => ['bail', 'required', 'min:3'],
            // 'adresse' => ['bail', 'required', 'min:3'],
            // 'adresse_complement' => ['bail'],
            // 'post_code' => ['bail', 'required', 'min:3'],
            // 'company_number' => ['bail', 'required', 'min:3'],
            // 'vat_number' => ['bail'],
            // 'country' => ['integer'],
            // 'state' => ['integer'],
            // 'city' => ['integer'],
            // 'email' => ['required', 'email', 'regex:/(.+)@(.+)\.(.+)/i', Rule::unique('transport_companies', 'email')->ignore($model)],
            // 'phone' => ['required', 'regex:' . RegexEnum::PHONE, 'min:11', 'max:15', Rule::unique('transport_companies', 'phone')->ignore($model)],
            // 'fix' => ['nullable', 'regex:' . RegexEnum::PHONE, 'min:11', 'max:15', Rule::unique('transport_companies', 'fix')->ignore($model)],
            // 'fax' => ['nullable', 'regex:' . RegexEnum::PHONE, 'min:11', 'max:15', Rule::unique('transport_companies', 'fax')->ignore($model)],
        ];
    }
}
?>
