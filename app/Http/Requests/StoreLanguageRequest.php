<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLanguageRequest extends FormRequest
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
            'name' => [
                'bail',
                'required',
                'min:3',
                // Rule::unique('languages')->ignore($this->language)
            ],
             'locale'=>['bail','required','min:2','max:2',
            // Rule::unique('languages','locale')->ignore($this->language),

        ],
            'direction'=>['bail','required','min:2','max:3'],
        ];
    }
}
