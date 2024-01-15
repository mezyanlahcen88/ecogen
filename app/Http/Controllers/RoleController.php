<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-show', ['only' => ['show']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        // $objects = Role::orderBy('created_at','desc')->get();
        // return view('roles.index', compact('objects'));
         $objects = Role::orderBy('created_at','desc')->whereNot('name','super admin')->get();
        return view('roles.index', compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::get();

        $permissions = Permission::get();
        return view('roles.create', compact('groupes', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' => 'required|unique:roles,name',
                'permissions' => 'required',
            ],
            [
                'role.required' => 'The role field is required',
                'permissions.required' => 'You should chose at least one permission',
            ],
        );

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));
        storeSidebar();
        Alert()->success('Super', 'role à été modifié avec succée');
        return redirect()->route('roles.index');

        // $all=$request->all();
        // return $all;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupes = Groupe::get();
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->get();
        return view('roles.show', compact('role', 'groupes', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $groupes = Groupe::get();
        $role = Role::findOrFail($id);
        $groupes = Groupe::get();

        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('roles.edit', compact('role', 'groupes', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $role = Role::find($id);

        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);
        // $role->givePermissionTo($request->permissions);
        Alert()->success('Super', 'role à été modifié avec succée');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->object_id;
        $role = Role::findOrFail($id);
        $role->delete();
        storeSidebar();
        alert()->success('Super', 'Role à été suprimée avec succée');
        return redirect()->route('roles.index');
    }
}
