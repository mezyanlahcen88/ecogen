<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Dto\ReglementDto;
use App\Models\Reglement;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use App\Forms\ReglementForm;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreReglementRequest;


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

        $tableRows = (new Reglement())->getRowsTable();
        $objects = Reglement::get();
        return view('reglements.index', compact('tableRows', 'objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Reglement::onlyTrashed()->get();
        $tableRows = (new Reglement())->getRowsTableTrashed();
        return view('reglements.trashedIndex', compact('tableRows', 'objects'));
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
        return view('reglements.create', compact('variable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // we need 5 paramtre document_id document_type nature_reg client parent_id
        $data = $request->all();
        foreach ($data['reglements'] as $item) {
            if (empty($item['id'])) {
            // Si l'ID est vide, créez un nouvel enregistrement
            $reglement = new Reglement();
                $reglement->id = Str::uuid();
                $reglement->reg_code = getRegNumerotation() . '/' . getExercice();

                incRegNumerotation();
        } else {
            // Si l'ID existe, recherchez l'enregistrement correspondant ou créez-en un nouveau
            $reglement = Reglement::updateOrCreate(['id' => $item['id']], $item);
        }

                // getRegNumerotation
                $reglement->document_id = $item['document_id'];
                $reglement->document_type = $item['document_type'];
                $reglement->date_reg = $item['date_reg'];
                $reglement->amount_reg = $item['amount_reg'];
                $reglement->mode_reg = $item['mode_reg'];
                $reglement->nature_reg = 'vente';
                $reglement->parent_type = 'client';
                $reglement->parent_id = $item['parent_id'];
                $reglement->comment = $item['comment'];
                $reglement->save();

                $command = Command::findOrFail($item['document_id']);
                // $command->total_restant = $command->total_restant - $item['amount_reg'];
                // $command->total_payant = $command->total_payant + $item['amount_reg'];
                $command->total_restant = $command->TTTC - $command->reglements()->sum('amount_reg');
                $command->total_payant = $command->reglements()->sum('amount_reg');
                $command->status = 'Validé';
                $command->save();
        }

        return response()->json(['success' => true]);

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
        return view('reglements.edit', compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, string $id)
{
    $data = $request->all();
    // dd( $data);
    $updatedReglementIds = [];
 $commandId = $id;
    foreach ($data['reglements'] as $item) {


        $CommandeReglementData = [
            'document_id' => $item['document_id'],
            'document_type' => $item['document_type'],
            'date_reg' => $item['date_reg'],
            'amount_reg' => $item['amount_reg'],
            'mode_reg' => $item['mode_reg'],
            'nature_reg' => 'vente',
            'parent_type' => 'client',
            'parent_id' => $item['parent_id'],
            'comment' => $item['comment'],
        ];

        $existingReglement = DB::table('reglements')
            ->where('document_id', $item['document_id'])
            ->where('id', $item['id'])
            ->first();

        if ($existingReglement) {
            DB::table('reglements')->where('id', $item['id'])->update($CommandeReglementData);
        } else {
            $CommandeReglementData['id'] = Str::uuid();
            $CommandeReglementData['reg_code'] = getRegNumerotation() . '/' . getExercice();
            $CommandeReglementData['created_at'] = now();
            DB::table('reglements')->insert($CommandeReglementData);
        }



        $updatedReglementIds[] = $item['id'];
    }

    // Supprimer les règlements qui ne sont pas dans la liste mise à jour
    DB::table('reglements')
        ->where('document_id', $commandId)
        ->whereNotIn('id', $updatedReglementIds)
        ->delete();
        $command = Command::findOrFail($commandId);
        $command->total_restant = $command->TTTC - $command->reglements()->sum('amount_reg');
        $command->total_payant = $command->reglements()->sum('amount_reg');
        $command->status = 'Validé';
        $command->save();
    return response()->json(['success' => true]);
}




    // public function update(StoreReglementRequest $request, string $id)
    // {
    //     $validated = $request->validated();
    //     $this->crudService->updateRecord(new Reglement(), $validated, $id);
    //     return redirect()->route('reglements.index');
    // }

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
