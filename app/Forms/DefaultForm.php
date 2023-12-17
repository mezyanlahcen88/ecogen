<?php

namespace App\Forms;


use App\Models\User;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;
use App\Forms\FieldsType\ImageField;
use App\Forms\FieldsType\InputField;
use App\Forms\FieldsType\HiddenField;
use App\Forms\FieldsType\SelectField;

class DefaultForm extends AbstractForm
{

    /**
 * Get the validation rules for the model.
 *
 * @param string|null $model The model to get the rules for. Default is null.
 * @return array The array of validation rules.
 */
    public static function getRules($model = null): array {
        return [

        ];
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
        return [

        ];
    }
}
