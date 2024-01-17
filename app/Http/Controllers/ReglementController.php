<?php

namespace App\Http\Controllers;

use App\Dto\ReglementDto;
use App\Models\Reglement;
use App\Forms\ReglementForm;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreReglementRequest;
use RealRashid\SweetAlert\Facades\Alert;


class ReglementController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:reglement-list|reglement-create|reglement-edit|reglement-show|reglement-delete', ['only' => ['index']]);
        $this->middleware('permission:reglement-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:reglement-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:reglement-show', ['only' => ['show']]);
        $this->middleware('permission:reglement-delete', ['only' => ['destroy']]);
        $this->middleware('permission:reglement-restore', ['only' => ['restore']]);
        $this->middleware('permission:reglement-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:reglement-forse-delete', ['only' => ['forseDelete']]);
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

           $tableRows =(new Reglement())->getRowsTable();
        $objects = Reglement::get();
        return view('reglements.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Reglement::onlyTrashed()->get();
        $tableRows =(new Reglement())->getRowsTableTrashed();
        return view('reglements.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Reglement();
        $variable = '';
        return view('reglements.create',compact('variable'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReglementRequest $request)
    {
        $validated = $request->validated();
        // [
        //     // {
        //     //     "modePaiment": "Cheque",
        //     //     "num_order": "",
        //     //     "comment": "fff",
        //     //     "montantPayer": 500,
        //     //     "dateEcheance": "2024-01-17T16:44:55.093Z"
        //     // }
        // ]
        // $object->ref_reg = $request->ref_reg;
        // $object->date_reg = $request->dateEcheance;
        // $object->amount_reg = $request->amount_reg;
        // $object->mode_reg = $request->modePaiment;
        // $object->nature_reg = $request->nature_reg;
        // $object->parent_type = $request->parent_type;
        // $object->parent_id = $request->parent_id;
        // $object->comment = $request->comment;


        return redirect()->route('reglements.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = reglement::findOrfail($id);
        return view('reglements.edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReglementRequest $request,string $id)
    {
        $validated = $request->validated();
        $this->crudService->updateRecord(new Reglement(),$validated,$id);
        return redirect()->route('reglements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Reglement::findOrFail($request->id)->delete();

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

        $object = Reglement::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('reglements.index');
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

        $object = Reglement::withTrashed()->findOrFail($id);
        // deletePicture($object,'reglements','picture');
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
        $object = Reglement::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.reglement_message_activated') : trans('translation.reglement_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
