<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
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
             'reglement' => ['bail', 'required', 'min:3'],
             'compte' => ['bail', 'required', 'min:3'],
             'picture' => ['bail', 'required', 'min:3'],
             'nature' => ['bail', 'required', 'min:3'],
             'comment' => ['bail', 'nullable', 'min:3'],
        ];
    }
}
?>
