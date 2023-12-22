<?php

namespace App\Http\Controllers;

use App\Dto\NumerotationDto;
use App\Models\Numerotation;
use App\Forms\NumerotationForm;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreNumerotationRequest;


class NumerotationController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:numerotation-list|numerotation-create|numerotation-edit|numerotation-show|numerotation-delete', ['only' => ['index']]);
        $this->middleware('permission:numerotation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:numerotation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:numerotation-show', ['only' => ['show']]);
        $this->middleware('permission:numerotation-delete', ['only' => ['destroy']]);
        $this->middleware('permission:numerotation-restore', ['only' => ['restore']]);
        $this->middleware('permission:numerotation-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:numerotation-forse-delete', ['only' => ['forseDelete']]);
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

           $tableRows =(new Numerotation())->getRowsTable();
        $objects = Numerotation::get();
        return view('numerotations.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Numerotation::onlyTrashed()->get();
        $tableRows =(new Numerotation())->getRowsTableTrashed();
        return view('numerotations.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Numerotation();
        $variable = '';
        return view('numerotations.create',compact('variable'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumerotationRequest $request)
    {
        $validated = $request->validated();
        $this->crudService->storeRecord(new Numerotation(),$request->except('_token','proengsoft_jsvalidation'));

        return redirect()->route('numerotations.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Numerotation  $numerotation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Numerotation  $numerotation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = numerotation::findOrfail($id);
        return view('numerotations.edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Numerotation  $numerotation
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNumerotationRequest $request,string $id)
    {
        $validated = $request->validated();
        $this->crudService->updateRecord(new Numerotation(),$validated,$id);
        return redirect()->route('numerotations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Numerotation  $numerotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Numerotation::findOrFail($request->id)->delete();

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

        $object = Numerotation::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('numerotations.index');
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

        $object = Numerotation::withTrashed()->findOrFail($id);
        // deletePicture($object,'numerotations','picture');
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
        $object = Numerotation::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.numerotation_message_active') : trans('translation.numerotation_message_inactive');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
