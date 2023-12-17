<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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

        $uuidRule = Rule::unique('users', 'uuid')->ignore($this->user);
        $regexPhone = '/^\+(?:[0-9]\x20?){6,14}[0-9]$/';
        return [
            'first_name' => ['bail', 'required', 'min:3', 'max:50'],
            'last_name' => ['bail', 'required', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'regex:/(.+)@(.+)\.(.+)/i', Rule::unique('users', 'email')->ignore($this->user)],
            'phone' => ['required','regex:'.$regexPhone,'min:11','max:15',Rule::unique('users', 'phone')->ignore($this->user)],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => 'required|same:password',
            'roles_name' => ['required'],
        ];
    }
}
?>
