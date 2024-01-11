<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSettingRequest extends FormRequest
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
        	'system_name' => 'required',
        	'title' => 'required',
        	'address' => 'required',
        	'phone' => 'required',
        	'email' => 'required|email',
            'picture' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5048|dimensions:max_width=300,max_height=100',
        ];
    }
}
?>
