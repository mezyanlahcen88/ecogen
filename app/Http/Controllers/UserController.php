<?php

namespace App\Http\Controllers;

use App\Dto\UserDto;
use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Forms\UserForm;
use App\Models\Country;
use App\Models\Language;
use App\Models\Profession;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-show|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-show', ['only' => ['show']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->staticOptions = $staticOptions;
        $this->crudService = $crudService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = User::where('id', '!=', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('users.index', compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $validated = $request->validated();
        $object = new User();
        $object->uuid = Str::uuid();
        $object->first_name = $request->first_name;
        $object->last_name = $request->last_name;
        $object->email = $request->email;
        $object->password = Hash::make($request->password);
        $object->phone = $request->phone;
        if ($request->hasFile('picture')) {
            dealWithPicture($request ,$object,'picture',$request->username ,'users','store');
        }
        $object->roles_name = $request->roles_name;
        $object->address = $request->address;
        $object->save();

        $object->assignRole($request->roles_name);
        Alert()->success(trans('translation.general_general_super'), trans('translation.user_message_store'));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $object = User::whereUuid($uuid)->first();
        return view('users.show', compact('object'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,String $uuid)
    {
        $object = User::whereUuid($uuid)->first();
        $roles = Role::pluck('name','id');

        return view('users.edit', compact('object','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $all = $request->except('_token', '_method');
        $object = User::whereUuid($id)->first();
        foreach ($all as $key => $value) {
            if (!empty($value)) {
                $object->$key = $value;
            }
        }
        $object->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = User::findOrFail($request->id)->delete();
        // storeSidebar();
    }

    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed()
    {
        $objects = User::orderBy('created_at', 'desc')
            ->onlyTrashed()
            ->get();
        return view('users.trashedIndex', compact('objects'));
    }

    /**
     * Restore a soft-deleted user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {
        $object = User::withTrashed()
            ->findOrFail($id)
            ->restore();
        // storeSidebar();
        Alert()->success(trans('translation.general_general_super'), trans('translation.user_message_restore'));
        return redirect()->route('users.index');
    }

    /**
     * Force delete a record permanently.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the record to force delete.
     * @return void
     */
    public function forceDelete(Request $request, $id)
    {
        $object = User::withTrashed()->findOrFail($id);
        $object->forceDelete();
        storeSidebar();
    }

        /**
     * Change the status (active/inactive) of a user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = User::whereUuid($id)->first();
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.user_message_activated') : trans('translation.user_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
