<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Dto\GarantyDto;
use App\Models\Garanty;
use App\Forms\GarantyForm;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreGarantyRequest;
use App\Models\Supplier;

class GarantyController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:garanty-list|garanty-create|garanty-edit|garanty-show|garanty-delete', ['only' => ['index']]);
        $this->middleware('permission:garanty-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:garanty-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:garanty-show', ['only' => ['show']]);
        $this->middleware('permission:garanty-delete', ['only' => ['destroy']]);
        $this->middleware('permission:garanty-restore', ['only' => ['restore']]);
        $this->middleware('permission:garanty-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:garanty-forse-delete', ['only' => ['forseDelete']]);
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

           $tableRows =(new Garanty())->getRowsTable();
        $objects = Garanty::get();
        return view('garanties.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Garanty::onlyTrashed()->get();
        $tableRows =(new Garanty())->getRowsTableTrashed();
        return view('garanties.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $garanties_types = $this->staticOptions::GARANTIES_TYPES;
        $parent_types = $this->staticOptions::PARENT_TYPES;
        return view('garanties.create',compact('garanties_types','parent_types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGarantyRequest $request)
    {
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
        $object->total_garanties = $request->amount;
        $object->save();

        return redirect()->route('garanties.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Garanty  $garanty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Garanty  $garanty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = garanty::findOrfail($id);
        if($object->parent_type == 'Client'){
            $parents = Client::pluck('name_fr','id');
        }else{
            $parents = Supplier::pluck('name_fr','id');
        }
        $garanties_types = $this->staticOptions::GARANTIES_TYPES;
        $parent_types = $this->staticOptions::PARENT_TYPES;
        return view('garanties.edit',compact('object','garanties_types','garanties_types','parent_types','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Garanty  $garanty
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGarantyRequest $request,string $id)
    {
        $validated = $request->validated();
        $garanty = Garanty::findOrFail($id);
        $garanty->amount = $request->amount;
        $garanty->parent_id = $request->parent_id;
        $garanty->parent_type = $request->parent_type;
        $garanty->type = $request->type;
        if($request->hasFile('picture')){
            dealWithPicture($request,$garanty,'picture', $request->parent_type,'garanties','update');
        }
        $garanty->document_ref = $request->document_ref;
        $garanty->user_id = Auth::id();
        $garanty->comment = $request->comment;
        $garanty->doe = $request->doe;
        $garanty->save();

        if($garanty->parent_type == 'Client'){
            $object = Client::findOrFail($request->parent_id);
            $object->total_garanties = $request->amount;
            $object->save();
        }else{
            $object = Supplier::findOrFail($request->parent_id);
            $object->total_garanties = $request->amount;
            $object->save();
        }
        return redirect()->route('garanties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Garanty  $garanty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Garanty::findOrFail($request->id)->delete();

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

        $object = Garanty::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('garanties.index');
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

        $object = Garanty::withTrashed()->findOrFail($id);
        // deletePicture($object,'garanties','picture');
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
        $object = Garanty::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.garanty_message_activated') : trans('translation.garanty_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
