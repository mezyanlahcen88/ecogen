<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarDocumentsRequest extends FormRequest
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
            'nature' => ['bail','required'],
            'start_date' => ['bail','required'],
            'end_date' => ['bail','required'],
            'comment' => ['bail','nullable'],
            'tranche' => ['bail','required'],
            'status' => ['bail','required'],
        ];
    }
}
