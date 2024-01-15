<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarDocument;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StoreCarRequest;
use RealRashid\SweetAlert\Facades\Alert;



class CarController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:car-list|car-create|car-edit|car-show|car-delete', ['only' => ['index']]);
        $this->middleware('permission:car-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:car-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:car-show', ['only' => ['show']]);
        $this->middleware('permission:car-delete', ['only' => ['destroy']]);
        $this->middleware('permission:car-restore', ['only' => ['restore']]);
        $this->middleware('permission:car-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:car-forse-delete', ['only' => ['forseDelete']]);
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

           $tableRows =(new Car())->getRowsTable();
        $objects = Car::get();
        return view('cars.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Car::onlyTrashed()->get();
        $tableRows =(new Car())->getRowsTableTrashed();
        return view('cars.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Car();
        $variable = '';
        return view('cars.create',compact('variable'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $validated = $request->validated();
        $this->crudService->storeRecord(new Car(),$request->except('_token','proengsoft_jsvalidation'));

        return redirect()->route('cars.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = car::findOrfail($id);
        return view('cars.edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCarRequest $request,string $id)
    {
        $validated = $request->validated();
        $update = $this->crudService->updateRecord(new Car(),$validated,$id);
        if($update){
            Alert::success('Success Title', 'Success Message');
        }
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Car::findOrFail($request->id)->delete();

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

        $object = Car::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('cars.index');
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

        $object = Car::withTrashed()->findOrFail($id);
        // deletePicture($object,'cars','picture');
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
        $object = Car::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.car_message_activated') : trans('translation.car_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
    public function createDocument($id){
        $object = Car::findOrFail($id);
        $documents = $this->staticOptions::CAR_DOCUMENTS;
        $tranches = $this->staticOptions::TRANCHES;
        $etats = $this->staticOptions::ETATS;
        return view("cars.documents.create_documents",compact('object','documents','tranches','etats'));
    }

    public function storeDocument(Request $request){
        // dd($request->all());
        // $validated = $request->validated();
        $document = new CarDocument();
        $document->id = Str::uuid();
        $document->car_id = $request->car_id;
        $document->nature = $request->nature;
        $document->start_date = $request->start_date;
        $document->end_date = $request->end_date;
        $document->tranche = $request->tranche;
        if($request->hasFile('picture')){
            dealWithPicture($request,$document,'picture', $request->nature,'documents','store');
        }
        $document->comment = $request->comment;
        $document->status = $request->status;
        $document->save();
        return back();
    }

}
