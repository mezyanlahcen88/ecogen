<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Dto\CommandDto;
use App\Models\Command;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\PDF;
use App\Forms\CommandForm;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreCommandRequest;


class CommandController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:command-list|command-create|command-edit|command-show|command-delete', ['only' => ['index']]);
        $this->middleware('permission:command-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:command-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:command-show', ['only' => ['show']]);
        $this->middleware('permission:command-delete', ['only' => ['destroy']]);
        $this->middleware('permission:command-restore', ['only' => ['restore']]);
        $this->middleware('permission:command-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:command-forse-delete', ['only' => ['forseDelete']]);
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

           $tableRows =(new Command())->getRowsTable();
        $objects = Command::get();
        return view('commands.index',compact('tableRows','objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Command::onlyTrashed()->get();
        $tableRows =(new Command())->getRowsTableTrashed();
        return view('commands.trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $object = new Command();
        $products = Product::pluck('name_fr', 'id');
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        $clients = Client::pluck('name_fr', 'id');
        // $clients = Client::select('id','name_fr','name_ar')->get();
        $command_status = $this->staticOptions::COMMAND_STATUS;
        return view('commands.create', compact('products', 'command_status', 'categories', 'clients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
 {
        // $validated = $request->validated();
        $data = $request->all();

        $command = new Command();
        $command->id = Str::uuid();
        $command->command_code = $data['num_command'];
        $command->HT = $data['total_ht'];
        $command->TVA = $data['total_ttva'];
        $command->TTTC = $data['total_ttc'];
        $command->status = $data['status'];
        $command->status_date = $data['status_date'];
        $command->client_id = $data['client'];
        $command->created_by = Auth::id();
        $command->comment = $data['comment'];
        $command->save();
        foreach ($data['products'] as $item) {
            DB::table('product_commands')->insert([
                'id' => Str::uuid(),
                'devis_id' => $command->id,
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
        incCommandNumerotation();
        return response()->json(['success'=>true]);
        // ->with('redirectTo', route('devis.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = Command::with('products')->findOrfail($id);
        return view('commands.show', compact('object'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = Command::findOrfail($id);
        $products = Product::pluck('name_fr', 'id');
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        $clients = Client::pluck('name_fr', 'id');

        $command_status = $this->staticOptions::DEVIS_STATUS;
        return view('commands.edit', compact('object','products', 'command_status', 'categories', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommandRequest $request,string $id)
    {
        $validated = $request->validated();
        $this->crudService->updateRecord(new Command(),$validated,$id);
        return redirect()->route('commands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Command::findOrFail($request->id)->delete();

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

        $object = Command::withTrashed()->findOrFail($id)->restore();
        // storeSidebar();
        return redirect()->route('commands.index');
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

        $object = Command::withTrashed()->findOrFail($id);
        // deletePicture($object,'commands','picture');
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
        $object = Command::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.command_message_activated') : trans('translation.command_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }

    public function generatePdf($id)
    {
        $object = Command::with('products')->findOrfail($id)->toArray();

        $pdf = PDF::loadView('devis.devis_pdf', $object);
        $filename = $object['devis_code'] . '_' . now()->format('YmdHis') . '.pdf';
        return $pdf->download($filename);
    }
}
