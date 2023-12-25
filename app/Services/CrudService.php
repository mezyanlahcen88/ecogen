<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Service des settings
 */
class CrudService
{

public function getAllRecords(){

}
public function getAllDeletedRecords(){

}

public function storeRecord($model ,array $request){
    $record = $model;
    $record->id = Str::uuid();
    foreach ($request as $key => $value) {
        $record->$key = $value;
        }
    $record->save();
    return true;
}

public function storeRecordWithFile($model ,array $request){
    $record = $model;
    $record->id = Str::uuid();

    foreach ($request as $key => $value) {
        if($key == 'picture'){
            dealWithPicture($request,$record,'picture', $request['picture'],'products','store');
        }
        $record->$key = $value;
        }
    $record->save();
    return true;
}
public function updateRecord($model ,array $request ,string $id)
{
    $record = $model::where('id', $id)->firstOrFail();
    $fillableFields = array_diff_key($request, array_flip(['_token', 'proengsoft_jsvalidation','_method']));
    foreach ($fillableFields as $key => $value) {
        $record->$key = $value;
    }
    $record->save();
    // return true;

}
// public function showRecord(){

// }
// public function deleteRecord(){

// }
// public function forceDeleteRecord(){

// }
// public function restoreRecord(){

// }

}
