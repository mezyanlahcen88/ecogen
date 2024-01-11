<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Garanty;
use App\Dto\SupplierDto;
use App\Models\Supplier;
use App\Models\Profession;
use App\Forms\SupplierForm;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreGarantyRequest;
use App\Http\Requests\StoreSupplierRequest;


class SupplierController extends Controller
{
    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:supplier-list|supplier-create|supplier-edit|supplier-show|supplier-delete', ['only' => ['index']]);
        $this->middleware('permission:supplier-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:supplier-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:supplier-show', ['only' => ['show']]);
        $this->middleware('permission:supplier-delete', ['only' => ['destroy']]);
        $this->middleware('permission:supplier-restore', ['only' => ['restore']]);
        $this->middleware('permission:supplier-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:supplier-forse-delete', ['only' => ['forseDelete']]);
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
        $tableRows = (new Supplier())->getRowsTable();
        $objects = Supplier::get();
        return view('suppliers.index', compact('tableRows', 'objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Supplier::onlyTrashed()->get();
        $tableRows = (new Supplier())->getRowsTableTrashed();
        return view('suppliers.trashedIndex', compact('tableRows', 'objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $object = new Supplier();
        $regions = Region::pluck('name', 'id');
        $supplier_types = $this->staticOptions::CLIENT_TYPES;
        $parent_types = $this->staticOptions::PARENT_TYPES;
        $fonctions = Profession::pluck('name', 'id');

        return view('suppliers.create', compact('regions', 'supplier_types', 'parent_types', 'fonctions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
        $validated = $request->validated();

        // dd($request->all());
        $object = new Supplier();
        $object->id = Str::uuid();
        // $object->code_supplier = getSupplierNumerotation();
        $object->code_supplier = 'CLT-1';
        $object->ice = $request->ice;
        $object->name_ar = $request->name_ar;
        $object->name_fr = $request->name_fr;
        $object->fonction = $request->fonction;
        $object->phone = $request->phone;
        $object->fax = $request->fax;
        $object->email = $request->email;
        $object->type_supplier = $request->type_supplier;
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
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = Supplier::findOrFail($id);
        $regions = Region::pluck('name', 'id');
        $supplier_types = $this->staticOptions::CLIENT_TYPES;
        $parent_types = $this->staticOptions::PARENT_TYPES;
        $fonctions = Profession::pluck('name', 'id');
        return view('suppliers.edit', compact('object','regions', 'supplier_types', 'parent_types', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupplierRequest $request, $id)
    {
        $validated = $request->validated();

        $object = Supplier::findOrFail($id);
        $object->ice = $request->ice;
        $object->name_ar = $request->name_ar;
        $object->name_fr = $request->name_fr;
        $object->fonction = $request->fonction;
        $object->phone = $request->phone;
        $object->fax = $request->fax;
        $object->email = $request->email;
        $object->type_supplier = $request->type_supplier;
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
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = Supplier::findOrFail($request->id)->delete();
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
        $object = Supplier::withTrashed()
            ->findOrFail($id)
            ->restore();
        // storeSidebar();
        return redirect()->route('suppliers.index');
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
        $object = Supplier::withTrashed()->findOrFail($id);
        // deletePicture($object,'suppliers','picture');
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
        $object = Supplier::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.supplier_message_activated') : trans('translation.supplier_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }

    public function createGaranty($id){
        $object = Supplier::findOrFail($id);
        $garanties_types = $this->staticOptions::GARANTIES_TYPES;
        return view("suppliers.garanties.create",compact('object','garanties_types'));
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
        $garanty->user_id = Auth::id();
        $garanty->comment = $request->comment;
        $garanty->doe = $request->doe;
        $garanty->save();

        $object = Supplier::findOrFail($request->parent_id);
        $object->total_garanties = $object->total_garanties + $request->amount;
        $object->save();
        return back();
    }
}
