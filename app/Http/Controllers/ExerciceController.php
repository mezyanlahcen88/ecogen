<?php

namespace App\Http\Controllers;

use App\Dto\ExerciceDto;
use App\Models\Exercice;
use App\Forms\ExerciceForm;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreExerciceRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ExerciceController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:exercice-list|exercice-create|exercice-edit|exercice-show|exercice-delete', ['only' => ['index']]);
        $this->middleware('permission:exercice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:exercice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exercice-show', ['only' => ['show']]);
        $this->middleware('permission:exercice-delete', ['only' => ['destroy']]);
        $this->middleware('permission:exercice-restore', ['only' => ['restore']]);
        $this->middleware('permission:exercice-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:exercice-forse-delete', ['only' => ['forseDelete']]);
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

        $tableRows =(new Exercice())->getRowsTable();
        $objects = Exercice::get();
        return view('exercices.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Exercice::onlyTrashed()->get();
        $tableRows =(new Exercice())->getRowsTableTrashed();
        return view('exercices.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Exercice();
        $exercice_etats = $this->staticOptions::EXERCICE_ETATS;
        return view('exercices.create',compact('exercice_etats'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExerciceRequest $request)
    {
        $validated = $request->validated();
        $this->crudService->storeRecord(new Exercice(),$request->except('_token','proengsoft_jsvalidation'));
        Alert()->success(trans('translation.general_general_super'), trans('translation.supplier_message_store'));
        return redirect()->route('exercices.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercice  $exercice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercice  $exercice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = exercice::findOrfail($id);
        $exercice_etats = $this->staticOptions::EXERCICE_ETATS;
        return view('exercices.edit',compact('object','exercice_etats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercice  $exercice
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExerciceRequest $request,string $id)
    {

        $validated = $request->validated();
        $this->crudService->updateRecord(new Exercice(),$validated,$id);
        Alert()->success(trans('translation.general_general_super'), trans('translation.supplier_message_store'));
        return redirect()->route('exercices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercice  $exercice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Exercice::findOrFail($request->id)->delete();

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

        $object = Exercice::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('exercices.index');
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

        $object = Exercice::withTrashed()->findOrFail($id);
        // deletePicture($object,'exercices','picture');
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
        $object = Exercice::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.exercice_message_activated') : trans('translation.exercice_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
