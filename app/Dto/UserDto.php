<?php

namespace App\Dto;

use App\Models\User;
use App\Forms\UserForm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\ObjectCrudService;
use Illuminate\Support\Facades\Hash;


class UserDto {

    const MODEL = 'App\Models\User';
    private ObjectCrudService $objectCrudService;

    public function __construct(ObjectCrudService $objectCrudService)
    {
        $this->objectCrudService = $objectCrudService;
    }

    /**
     * Method Dto to store a new User from request
     *
     * @return User Model
     */
    public function storeUser(Request $request): User {
        $object = new User();
        $object = $this->objectCrudService->AttributeRequestWithFileObject(
                $request,
                $object,
                self::MODEL,
                'images/users/',
                UserForm::getRules($object)
        );
        $object->uuid = Str::uuid();
        $object->password = Hash::make($request->password);
        $object->language_id = 1;
        $object->isactive = 1;
        $object->save();
        if($object->save()){
            $user = User::latest()->first();
            $user->assignRole($request->roles_name);
        }
        return $object;
    }

    /**
     * Method Dto to update a User from request
     *
     * @return User Model
     */
    public function updateUser(Request $request, $id): User {


        $object = User::whereUuid($id)->first();
        $object = $this->objectCrudService->AttributeRequestWithFileObject(
            $request,
            $object,
            self::MODEL,
            'images/users/',
            UserForm::getUpdatedRules($object,$request->all())
    );
    $object->save();
    return $object;
    }

    /**
     * Method Dto to change the status for a User object
     *
     * @return JsonResponse
     */
    public function changeUserStatus(Request $request): JsonResponse {
        $id = $request->id;
        $object = User::findOrFail($id);
        $object->status = !$object->status;
        $object->save();
        return response()->json(['code'=>200,'isactive'=>$object->status]);
    }

    /**
     * Method Dto to delete a object from request
     *
     * @return void
     */
    public function deleteUser(Request $request) {
        $object = User::findOrFail($request->id);
        $object->delete();
    }
}
