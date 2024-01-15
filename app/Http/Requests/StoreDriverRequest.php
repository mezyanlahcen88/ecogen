<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDriverRequest extends FormRequest
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
             'first_name' => ['bail', 'required', 'min:3'],
             'last_name' => ['bail', 'required', 'min:3'],

            // 'email' => ['required', 'email', 'regex:/(.+)@(.+)\.(.+)/i', Rule::unique('transport_companies', 'email')->ignore($model)],
            // 'phone' => ['required', 'regex:' . RegexEnum::PHONE, 'min:11', 'max:15', Rule::unique('transport_companies', 'phone')->ignore($model)],
            // 'fix' => ['nullable', 'regex:' . RegexEnum::PHONE, 'min:11', 'max:15', Rule::unique('transport_companies', 'fix')->ignore($model)],
            // 'fax' => ['nullable', 'regex:' . RegexEnum::PHONE, 'min:11', 'max:15', Rule::unique('transport_companies', 'fax')->ignore($model)],
        ];
    }
}
?>
