<?php

namespace App\Http\Controllers;

use App\Dto\WarehouseDto;
use App\Models\Warehouse;
use App\Forms\WarehouseForm;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreWarehouseRequest;


class WarehouseController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:warehouse-list|warehouse-create|warehouse-edit|warehouse-show|warehouse-delete', ['only' => ['index']]);
        $this->middleware('permission:warehouse-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:warehouse-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:warehouse-show', ['only' => ['show']]);
        $this->middleware('permission:warehouse-delete', ['only' => ['destroy']]);
        $this->middleware('permission:warehouse-restore', ['only' => ['restore']]);
        $this->middleware('permission:warehouse-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:warehouse-forse-delete', ['only' => ['forseDelete']]);
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

           $tableRows =(new Warehouse())->getRowsTable();
        $objects = Warehouse::get();
        return view('warehouses.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Warehouse::onlyTrashed()->get();
        $tableRows =(new Warehouse())->getRowsTableTrashed();
        return view('warehouses.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Warehouse();
        $variable = '';
        return view('warehouses.create',compact('variable'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarehouseRequest $request)
    {
        $validated = $request->validated();
        $this->crudService->storeRecord(new Warehouse(),$request->except('_token','proengsoft_jsvalidation'));

        return redirect()->route('warehouses.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = warehouse::findOrfail($id);
        return view('warehouses.edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWarehouseRequest $request,string $id)
    {
        $validated = $request->validated();
        $this->crudService->updateRecord(new Warehouse(),$validated,$id);
        return redirect()->route('warehouses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Warehouse::findOrFail($request->id)->delete();

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

        $object = Warehouse::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('warehouses.index');
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

        $object = Warehouse::withTrashed()->findOrFail($id);
        // deletePicture($object,'warehouses','picture');
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
        $object = Warehouse::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.warehouse_message_activated') : trans('translation.warehouse_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
