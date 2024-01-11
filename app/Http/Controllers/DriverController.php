<?php

namespace App\Http\Controllers;

use App\Dto\DriverDto;
use App\Models\Driver;
use App\Forms\DriverForm;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreDriverRequest;


class DriverController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:driver-list|driver-create|driver-edit|driver-show|driver-delete', ['only' => ['index']]);
        $this->middleware('permission:driver-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:driver-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:driver-show', ['only' => ['show']]);
        $this->middleware('permission:driver-delete', ['only' => ['destroy']]);
        $this->middleware('permission:driver-restore', ['only' => ['restore']]);
        $this->middleware('permission:driver-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:driver-forse-delete', ['only' => ['forseDelete']]);
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

           $tableRows =(new Driver())->getRowsTable();
        $objects = Driver::get();
        return view('drivers.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Driver::onlyTrashed()->get();
        $tableRows =(new Driver())->getRowsTableTrashed();
        return view('drivers.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Driver();
        $permis_types = $this->staticOptions::PERMIS_TYPES;
        return view('drivers.create',compact('permis_types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        $validated = $request->validated();
        $object = new Driver();
        $object->id = Str::uuid();
        $object->first_name = $request->first_name;
        $object->last_name = $request->last_name;
        $object->cin = $request->cin;
        $object->permis_number = $request->permis_number;
        $object->dob = $request->dob;
        $object->permis_type = $request->permis_type;
        $object->obs = $request->obs;

        if($request->hasFile('picture')){
            dealWithPicture($request,$object,'picture', $request->first_name,'drivers','store');
        }
        $object->save();

        return redirect()->route('drivers.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = driver::findOrfail($id);
        $permis_types = $this->staticOptions::PERMIS_TYPES;
        return view('drivers.edit',compact('object','permis_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDriverRequest $request,string $id)
    {
        $validated = $request->validated();
        $object = Driver::findOrFail($id);
        $object->first_name = $request->first_name;
        $object->last_name = $request->last_name;
        $object->cin = $request->cin;
        $object->permis_number = $request->permis_number;
        $object->dob = $request->dob;
        $object->permis_type = $request->permis_type;
        $object->obs = $request->obs;
        if($request->hasFile('picture')){
            dealWithPicture($request,$object,'picture', $request->first_name,'drivers','update');
        }
        $object->save();
        return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Driver::findOrFail($request->id)->delete();

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

        $object = Driver::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('drivers.index');
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

        $object = Driver::withTrashed()->findOrFail($id);
        // deletePicture($object,'drivers','picture');
        $object->forceDelete();
        // storeSidebar();
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
        $object = Driver::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.driver_message_activated') : trans('translation.driver_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
