<?php

namespace App\Http\Controllers;

use App\Dto\EmployeDto;
use App\Models\Employe;
use App\Forms\EmployeForm;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreEmployeRequest;


class EmployeController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:employe-list|employe-create|employe-edit|employe-show|employe-delete', ['only' => ['index']]);
        $this->middleware('permission:employe-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:employe-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:employe-show', ['only' => ['show']]);
        $this->middleware('permission:employe-delete', ['only' => ['destroy']]);
        $this->middleware('permission:employe-restore', ['only' => ['restore']]);
        $this->middleware('permission:employe-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:employe-forse-delete', ['only' => ['forseDelete']]);
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

           $tableRows =(new Employe())->getRowsTable();
        $objects = Employe::get();
        return view('employes.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Employe::onlyTrashed()->get();
        $tableRows =(new Employe())->getRowsTableTrashed();
        return view('employes.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Employe();
        $variable = '';
        return view('employes.create',compact('variable'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeRequest $request)
    {
        $validated = $request->validated();
        $this->crudService->storeRecord(new Employe(),$request->except('_token','proengsoft_jsvalidation'));

        return redirect()->route('employes.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = employe::findOrfail($id);
        return view('employes.edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeRequest $request,string $id)
    {
        $validated = $request->validated();
        $this->crudService->updateRecord(new Employe(),$validated,$id);
        return redirect()->route('employes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Employe::findOrFail($request->id)->delete();

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

        $object = Employe::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('employes.index');
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

        $object = Employe::withTrashed()->findOrFail($id);
        // deletePicture($object,'employes','picture');
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
        $object = Employe::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.employe_message_activated') : trans('translation.employe_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
