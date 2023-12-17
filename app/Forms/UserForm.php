<?php

namespace App\Forms;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Enums\RegexEnum;
use App\Enums\StaticOptions;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Forms\FieldsType\ImageField;
use App\Forms\FieldsType\InputField;
use App\Forms\FieldsType\SelectField;

class UserForm extends AbstractForm
{
    public $staticOptions;
    public function __construct(StaticOptions $staticOptions)
    {
        $this->staticOptions = $staticOptions;
    }

    /**
     * Get the validation rules for the model.
     *
     * @param string|null $model The model to get the rules for. Default is null.
     * @return array The array of validation rules.
     */
    public static function getRules($model = null): array
    {


        return [
            'firstname' => ['bail', 'required', 'min:3', 'max:50'],
            'lastname' => ['bail', 'required', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'regex:/(.+)@(.+)\.(.+)/i',Rule::unique('users','email')->ignore($model)],
            'phone' => ['required',
            'regex:'.RegexEnum::PHONE,
            'min:11',
            'max:15',
            Rule::unique('users', 'phone')->ignore($model)],
            'password' => ['required', 'confirmed', 'min:8'],
            'roles_name' => ['required'],
        ];
    }

    public static function getUpdatedRules($model = null, $requestRules): array
    {
        $rules = [];
        foreach (self::getRules($model) as $key => $value) {
            if (in_array($key, $requestRules)) {
                array_push($rules, [$key => $value]);
            }
        }
        return $rules;
    }
    /**
     * Get the fields for the object.
     *
     * @param mixed|null $object The object to get the fields for. Default is null.
     * @param array $params Additional parameters for retrieving the fields. Default is an empty array.
     * @return array The array of fields.
     */
    public static function getFields($object = null, $params = []): array
    {
        // $genders = $object->staticOptions::GENDER;

        return [
            'forms' => [
                // 1 ere form
                [
                    'cards' => [
                        [
                                'class' =>'col-xl-12',
                                'idCard'=>'userCard',
                                'rowsFields' => [
                                        [

                                            'firstname' => (new InputField())->setKey('firstname')
                                                ->setLabel(trans('translation.user_form_firstname'))
                                                ->setRequired(true)
                                                ->setClass('col-md-3 col-xl-3 col-xs-3 col-sm-3')
                                                ->setFieldClass('form-control')
                                                ->setPlaceholder(trans('translation.user_form_firstname_placeholder'))
                                                ->setValue($object->firstname ?? old('firstname')),

                                            'lastname' => (new InputField())->setKey('lastname')
                                                ->setLabel(trans('translation.user_form_lastname'))
                                                ->setRequired(true)
                                                ->setClass('col-md-3 col-xl-3 col-xs-3 col-sm-3')
                                                ->setFieldClass('form-control')
                                                ->setPlaceholder(trans('translation.user_form_lastname_placeholder'))
                                                ->setValue($object->lastname ?? old('lastname')),

                                            'roles_name' => (new SelectField())->setKey('roles_name[]')
                                                    ->setLabel(trans('translation.user_form_role_name'))
                                                    ->setRequired(true)
                                                    ->setClass('col-md-3 col-xl-3 col-xs-3 col-sm-3')
                                                    ->setPlaceholder(trans('translation.roles_name'))
                                                    ->setOptions(Role::pluck('name','name')->toArray())
                                                    ->setValue( $object->roles_name ?? old('roles_name')),
                                        ],

                                        [

                                            'email' => (new InputField())->setKey('email')
                                                ->setLabel(trans('translation.user_form_email'))
                                                ->setClass('col-md-4 col-xl-4 col-xs-4 col-sm-4')
                                                ->setFieldClass('form-control')
                                                ->setType('email')
                                                ->setPlaceholder(trans('translation.user_form_email_placeholder'))
                                                ->setValue($object->email ?? old('email')),

                                            'phone' => (new InputField())->setKey('phone')
                                                ->setLabel(trans('translation.user_form_phone'))
                                                ->setClass('col-md-4 col-xl-4 col-xs-4 col-sm-4')
                                                ->setFieldClass('form-control')
                                                ->setPlaceholder('Ex : +33xxxxxxxx')
                                                ->setValue($object->phone ?? old('phone')),


                                        ],


                                        [


                                                           
                                            'adresse' => (new InputField())->setKey('adresse')
                                                            ->setLabel(trans('translation.user_form_adresse'))
                                                            ->setRequired(true)
                                                            ->setClass('col-md-8 col-xl-8 col-xs-8 col-sm-8')
                                                            ->setFieldClass('form-control')
                                                            ->setPlaceholder(trans('translation.user_form_adresse_placeholder'))
                                                            ->setValue($object->adresse ?? old('adresse')),

                                        ],

                                        [
                                            'password' => (new InputField())->setKey('password')
                                                            ->setLabel(trans('translation.user_form_password'))
                                                            ->setRequired(true)
                                                            ->setType('password')
                                                            ->setClass('col-md-6 col-xl-6 col-xs-6 col-sm-6')
                                                            ->setFieldClass('form-control')
                                                            ->setPlaceholder(trans('translation.user_form_password_placeholder'))
                                                            ->setValue('$$$$$$$$' ?? old('password')),
                                            'password_confirmation' => (new InputField())->setKey('password_confirmation')
                                                            ->setLabel(trans('translation.user_form_confirm_password'))
                                                            ->setRequired(true)
                                                            ->setType('password')
                                                            ->setClass('col-md-6 col-xl-6 col-xs-6 col-sm-6')
                                                            ->setFieldClass('form-control')
                                                            ->setPlaceholder(trans('translation.user_form_password_placeholder'))
                                                            ->setValue('$$$$$$$$' ?? old('password_confirmation')),
                                        ],

                                    'roles_name' => (new SelectField())
                                        ->setKey('roles_name[]')
                                        ->setLabel(trans('translation.user_form_role_name'))
                                        ->setRequired(true)
                                        ->setClass('col-md-3 col-xl-3 col-xs-3 col-sm-3')
                                        ->setPlaceholder(trans('translation.roles_name'))
                                        ->setOptions(Role::pluck('name', 'name')->toArray())
                                        ->setValue($object->roles_name ?? old('roles_name')),
                                ],

                            'rowsImage' => [
                                [
                                    'picture' => (new ImageField())
                                        ->setKey('picture')
                                        ->setLabel(trans('translation.user_form_picture'))
                                        ->setRequired(false)
                                        ->setClass('col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2')
                                        ->setPlaceholder('')
                                        ->setImageFolder('users'),
                                ],
                            ],
                        ],
                    ],
                ],
            ],

    ];
    }
}
