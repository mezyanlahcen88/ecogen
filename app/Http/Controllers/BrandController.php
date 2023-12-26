<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreBrandRequest;
use RealRashid\SweetAlert\Facades\Alert;



class BrandController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:brand-list|brand-create|brand-edit|brand-show|brand-delete', ['only' => ['index']]);
        $this->middleware('permission:brand-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:brand-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:brand-show', ['only' => ['show']]);
        $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
        $this->middleware('permission:brand-restore', ['only' => ['restore']]);
        $this->middleware('permission:brand-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:brand-forse-delete', ['only' => ['forseDelete']]);
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

        $tableRows =(new Brand())->getRowsTable();
        $objects = Brand::get();
        return view('brands.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Brand::onlyTrashed()->get();
        $tableRows =(new Brand())->getRowsTableTrashed();
        return view('brands.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Brand();
        return view('brands.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $validated = $request->validated();

        $object = new Brand();
        $object->id = Str::uuid();
        $object->name = $request->name;
        if($request->hasFile('picture')){
            dealWithPicture($request,$object,'picture', $request->name,'brands','store');
        }
        $object->save();

         flash()->addInfo('Your account has been created, but requires verification.');
        // Alert()->success(trans('translation.general_general_super'), trans('translation.supplier_message_store'));
        return redirect()->route('brands.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = brand::findOrfail($id);
        return view('brands.edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandRequest $request,string $id)
    {
        $validated = $request->validated();
        // dd($request->all());
        $object = Brand::findOrfail($id);
        $object->name = $request->name;
        if($request->hasFile('picture')){
            dealWithPicture($request,$object,'picture', $request->name,'brands','update');
        }
        $object->save();

         flash()->addInfo('Your account has been created, but requires verification.');
        // Alert()->success(trans('translation.general_general_super'), trans('translation.supplier_message_update'));
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Brand::findOrFail($request->id)->delete();

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

        $object = Brand::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('brands.index');
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

        $object = Brand::withTrashed()->findOrFail($id);
        // deletePicture($object,'brands','picture');
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
        $object = Brand::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.brand_message_activated') : trans('translation.brand_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
