<?php

namespace App\Forms;

use Illuminate\Support\Facades\Request;

abstract class AbstractForm
{
    abstract protected static function getRules($model = null): array;
    // abstract protected static function getUpdatedRules($model = null, array $arrayRules): array;
    abstract protected static function getFields($object = null, $params = []): array;
}
