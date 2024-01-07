<?php

namespace App\Http\Controllers;

use App\Dto\DevisDto;
use App\Models\Devis;
use App\Models\Client;
use App\Models\Product;
use App\Forms\DevisForm;
use App\Models\Category;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDevisRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
class DevisController extends Controller
{
    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:devis-list|devis-create|devis-edit|devis-show|devis-delete', ['only' => ['index']]);
        $this->middleware('permission:devis-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:devis-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:devis-show', ['only' => ['show']]);
        $this->middleware('permission:devis-delete', ['only' => ['destroy']]);
        $this->middleware('permission:devis-restore', ['only' => ['restore']]);
        $this->middleware('permission:devis-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:devis-forse-delete', ['only' => ['forseDelete']]);
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
        $tableRows = (new Devis())->getRowsTable();
        $objects = Devis::get();
        return view('devis.index', compact('tableRows', 'objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Devis::onlyTrashed()->get();
        $tableRows = (new Devis())->getRowsTableTrashed();
        return view('devis.trashedIndex', compact('tableRows', 'objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $object = new Devis();
        $products = Product::pluck('name_fr', 'id');
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        $clients = Client::pluck('name_fr', 'id');
        // $clients = Client::select('id','name_fr','name_ar')->get();
        $devis_status = $this->staticOptions::DEVIS_STATUS;
        return view('devis.create', compact('products', 'devis_status', 'categories', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreDevisRequest $request)
    public function store(Request $request)
    {
        // $validated = $request->validated();
        $data = $request->all();

        $devis = new Devis();
        $devis->id = Str::uuid();
        $devis->devis_code = $data['num_devis'];
        $devis->HT = $data['total_ht'];
        $devis->TVA = $data['total_ttva'];
        $devis->TTTC = $data['total_ttc'];
        $devis->status = $data['status'];
        $devis->status_date = $data['status_date'];
        $devis->client_id = $data['client'];
        $devis->created_by = Auth::id();
        $devis->comment = $data['comment'];
        $devis->save();
        foreach ($data['products'] as $item) {
            DB::table('product_devis')->insert([
                'id' => Str::uuid(),
                'devis_id' => $devis->id,
                'product_id' => $item['id'],
                'designation' => $item['designation'],
                'quantity' => $item['quantite'],
                'price' => $item['prix'],
                'remise' => 5,
                'total_remise' => 5,
                'TOTAL_HT' => $item['ht'],
                'TVA' => $item['tva'],
                'TOTAL_TVA' => $item['ttva'],
                'TOTAL_TTC' => $item['ttc'],
                'unite' => $item['unite'],
            ]);
        }
        incDevisNumerotation();
        return response()->json(['success'=>true]);
        // ->with('redirectTo', route('devis.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = Devis::with('products')->findOrfail($id);
        return view('devis.show', compact('object'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = devis::findOrfail($id);
        $products = Product::pluck('name_fr', 'id');
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        $clients = Client::pluck('name_fr', 'id');
        $devis_status = $this->staticOptions::DEVIS_STATUS;

        return response()->json([
            'success' => true,
            'object' => $object,
            'products' => $products,
            'devis_status' => $devis_status,
            'categories' => $categories,
            'clients' => $clients,
        ])->with('redirectTo', route('devis.edit',$object->id));
        // return view('devis.edit', compact('object','products', 'devis_status', 'categories', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDevisRequest $request, string $id)
    {
        $validated = $request->validated();
        $this->crudService->updateRecord(new Devis(), $validated, $id);
        return redirect()->route('devis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = Devis::findOrFail($request->id)->delete();
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
        $object = Devis::withTrashed()
            ->findOrFail($id)
            ->restore();
        // storeSidebar();
        return redirect()->route('devis.index');
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
        $object = Devis::withTrashed()->findOrFail($id);
        // deletePicture($object,'devis','picture');
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
        $object = Devis::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.devis_message_activated') : trans('translation.devis_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }

    public function generatePdf($id)
{
    $object = Devis::with('products')->findOrfail($id)->toArray();

    $pdf = PDF::loadView('devis.devis_pdf', $object);
    $filename = $object['devis_code'] . '_' . now()->format('YmdHis') . '.pdf';
    return $pdf->download($filename);
}

}
