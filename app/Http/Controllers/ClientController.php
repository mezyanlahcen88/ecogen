<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Ville;
use App\Dto\ClientDto;
use App\Models\Client;
use App\Models\Region;
use App\Models\Garanty;
use App\Models\Secteur;
use App\Forms\ClientForm;
use App\Models\Profession;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\StoreGarantyRequest;

class ClientController extends Controller
{
    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:client-list|client-create|client-edit|client-show|client-delete', ['only' => ['index']]);
        $this->middleware('permission:client-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:client-show', ['only' => ['show']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy']]);
        $this->middleware('permission:client-restore', ['only' => ['restore']]);
        $this->middleware('permission:client-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:client-forse-delete', ['only' => ['forseDelete']]);
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
        $tableRows = (new Client())->getRowsTable();
        $objects = Client::with('garanties')->get();
        // return $objects;
        return view('clients.index', compact('tableRows', 'objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Client::onlyTrashed()->get();
        $tableRows = (new Client())->getRowsTableTrashed();
        return view('clients.trashedIndex', compact('tableRows', 'objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $object = new Client();
        $regions = Region::pluck('name', 'id');
        $client_types = $this->staticOptions::CLIENT_TYPES;
        $parent_types = $this->staticOptions::PARENT_TYPES;
        $fonctions = Profession::pluck('name', 'id');

        return view('clients.create', compact('regions', 'client_types', 'parent_types', 'fonctions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $validated = $request->validated();

        // dd($request->all());
        $object = new Client();
        $object->id = Str::uuid();
        // $object->code_client = getClientNumerotation();
        $object->code_client = $request->code_client;
        $object->ice = $request->ice;
        $object->name_ar = $request->name_ar;
        $object->name_fr = $request->name_fr;
        $object->fonction = $request->fonction;
        $object->phone = $request->phone;
        $object->fax = $request->fax;
        $object->email = $request->email;
        $object->type_client = $request->type_client;
        $object->region_id = $request->region_id;
        $object->ville_id = $request->ville_id;
        $object->secteur_id = $request->secteur_id;
        $object->cd_postale = $request->cd_postale;
        $object->plafond = $request->plafond;
        $object->address = $request->address;
        $object->obs = $request->obs;
        $object->created_by = Auth::id();
        // $object->remise = $request->remise;
        $object->remise = 5;
        $object->parent_id = $request->parent_id;
        $object->parent_type = $request->parent_type;
        $object->save();
        if (strpos($request->code_client, getPrefix('Client')) !== false) {
            incClientNumerotation();
        }
        return redirect()->route('clients.createGaranty', $object->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = client::findOrFail($id);
        $regions = Region::pluck('name', 'id');
        $villes = Ville::where('region_id',$object->region_id)->pluck('name', 'id');
        $secteurs = Secteur::where('ville_id',$object->ville_id)->pluck('name', 'id');

        $client_types = $this->staticOptions::CLIENT_TYPES;
        $parent_types = $this->staticOptions::PARENT_TYPES;
        $garanties_types = $this->staticOptions::GARANTIES_TYPES;
        $fonctions = Profession::pluck('name', 'id');

        return view('clients.edit', compact( 'object' ,'regions', 'client_types', 'parent_types', 'fonctions','garanties_types','villes','secteurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, string $id)
    {
        $validated = $request->validated();
        $object = Client::findOrFail($id);
        $object->ice = $request->ice;
        $object->name_ar = $request->name_ar;
        $object->name_fr = $request->name_fr;
        $object->fonction = $request->fonction;
        $object->phone = $request->phone;
        $object->fax = $request->fax;
        $object->email = $request->email;
        $object->type_client = $request->type_client;
        $object->region_id = $request->region_id;
        $object->ville_id = $request->ville_id;
        $object->secteur_id = $request->secteur_id;
        $object->cd_postale = $request->cd_postale;
        $object->address = $request->address;
        $object->obs = $request->obs;
        $object->created_by = Auth::id();
        // $object->remise = $request->remise;
        $object->remise = 5;
        $object->parent_id = $request->parent_id;
        $object->parent_type = $request->parent_type;
        $object->save();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = Client::findOrFail($request->id);
        if($object->count_docs == 0){
         $object->delete();
         return response()->json([
            'success'=>true,
            'message'=>trans('translation.client_message_delete')
        ]);
        }else{
         return response()->json([
            'success'=>false,
            'message'=>'vous ne pouvez pas supprimer ce client car il a  '. $object->count_docs .' document(s)'
        ]);
    }
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
        $object = Client::withTrashed()
            ->findOrFail($id)
            ->restore();
        // storeSidebar();
        return redirect()->route('clients.index');
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
        $object = Client::withTrashed()->findOrFail($id);
        // deletePicture($object,'clients','picture');
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
        $object = Client::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.client_message_activated') : trans('translation.client_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }

    public function createGaranty($id){
        $object = Client::findOrFail($id);
        $garanties_types = $this->staticOptions::GARANTIES_TYPES;
        return view("clients.garanties.create",compact('object','garanties_types'));
    }

    public function storeGaranty(StoreGarantyRequest $request){
        $validated = $request->validated();
        $garanty = new Garanty();
        $garanty->id = Str::uuid();
        $garanty->amount = $request->amount;
        $garanty->parent_id = $request->parent_id;
        $garanty->parent_type = $request->parent_type;
        $garanty->type = $request->type;
        if($request->hasFile('picture')){
            dealWithPicture($request,$garanty,'picture', $request->parent_type,'garanties','store');
        }
        $garanty->document_ref = $request->document_ref;
        $garanty->user_id = Auth::id();
        $garanty->comment = $request->comment;
        $garanty->doe = $request->doe;
        $garanty->save();

        $object = Client::findOrFail($request->parent_id);
        $object->total_garanties = $object->total_garanties + $request->amount;
        $object->save();
        trackinkAddedDoc($request->parent_id ,'Garantie');
        return back();
    }
}
