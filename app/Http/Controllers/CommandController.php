<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Dto\CommandDto;
use App\Models\Command;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\PDF;
use App\Models\Reglement;
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
        $tableRows = (new Command())->getRowsTable();
        $objects = Command::get();
        $clients = Client::get();

        return view('commands.index', compact('tableRows', 'objects', 'clients'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Command::onlyTrashed()->get();
        $tableRows = (new Command())->getRowsTableTrashed();
        return view('commands.trashedIndex', compact('tableRows', 'objects'));
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
        $command_status = $this->staticOptions::COMMAND_STATUS;
        $reglements = $this->staticOptions::GARANTIES_TYPES;

        return view('commands.create', compact('products', 'command_status', 'categories', 'clients', 'reglements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // $validated = $request->validated();
            $data = $request->all();

            $command = new Command();
            $command->id = Str::uuid();
            $command->command_code = $data['num_command'];
            $command->HT = $data['total_ht'];
            $command->TVA = $data['total_ttva'];
            $command->TTTC = $data['total_ttc'];
            $command->total_payant = 0.0;
            $command->total_restant = $data['total_ttc'];
            $command->status = $data['status'];
            $command->status_date = $data['status_date'];
            $command->client_id = $data['client'];
            $command->created_by = Auth::id();
            $command->comment = $data['comment'];
            $command->save();
            foreach ($data['products'] as $item) {
                DB::table('product_command')->insert([
                    'id' => Str::uuid(),
                    'command_id' => $command->id,
                    'product_id' => $item['id'],
                    'designation' => $item['designation'],
                    'quantity' => $item['quantite'],
                    'price' => $item['prix'],
                    'remise' => $item['remise'],
                    'total_remise' => $item['tremise'],
                    'TOTAL_HT' => $item['ht'],
                    'TVA' => $item['tva'],
                    'TOTAL_TVA' => $item['ttva'],
                    'TOTAL_TTC' => $item['ttc'],
                    'unite' => $item['unite'],
                ]);
            }
            incCommandNumerotation();
            DB::commit();
            trackinkAddedDoc($data['client'], 'commande');
            return response()->json([
                'success' => true,
                'id' => $command->id,
            ]);
            // ->with('redirectTo', route('Command.index'));
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
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
        $detailsReglement = $object->reglements()->get();
        // $detailsReglement = Reglement::where('command_id', $id);
        $clients = Client::pluck('name_fr', 'id');

        $command_status = $this->staticOptions::COMMAND_STATUS;
        $reglements = $this->staticOptions::GARANTIES_TYPES;

        $commandProducts = $object->products()->get();

        // Pass data to the "Command.edit" view
        $viewData = [
            'object' => $object,
            'products' => $products,
            'command_status' => $command_status,
            'categories' => $categories,
            'clients' => $clients,
            'commandProducts' => $commandProducts,
            'reglements' => $reglements,
            'detailsReglement' => $detailsReglement,
        ];

        // Check if the request expects JSON
        if (request()->expectsJson()) {
            return response()->json($viewData);
        }

        // If it's not an AJAX request, return the HTML view
        return view('commands.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommandRequest $request, string $id)
    {
        $data = $request->all();
        $command = Command::findOrFail($id);

        $command->HT = $data['total_ht'];
        $command->TVA = $data['total_ttva'];
        $command->TTTC = $data['total_ttc'];
        $command->status = $data['status'];
        $command->status_date = $data['status_date'];
        $command->client_id = $data['client'];
        $command->created_by = Auth::id();
        $command->comment = $data['comment'];
        $command->save();
        $updatedProductIds = [];
        foreach ($data['products'] as $item) {
            $productDevisData = [
                'designation' => $item['designation'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'remise' => $item['remise'],
                'total_remise' => $item['total_remise'],
                'TOTAL_HT' => $item['TOTAL_HT'],
                'TVA' => $item['TVA'],
                'TOTAL_TVA' => $item['TOTAL_TVA'],
                'TOTAL_TTC' => $item['TOTAL_TTC'],
                'unite' => $item['unite'],
            ];

            $existingProductDevis = DB::table('product_command')
                ->where('command_id', $command->id)
                ->where('product_id', $item['product_id'])
                ->first();

            if ($existingProductDevis) {
                // Le product_devis existe déjà, effectuez la mise à jour
                DB::table('product_command')
                    ->where('command_id', $command->id)
                    ->where('product_id', $item['product_id'])
                    ->update($productDevisData);
            } else {
                // Le product_command n'existe pas, créez un nouveau
                DB::table('product_command')->insert(array_merge(['id' => Str::uuid(), 'command_id' => $command->id, 'product_id' => $item['product_id']], $productDevisData));
            }

            $updatedProductIds[] = $item['product_id'];
        }

        // Supprimer les product_command qui ne sont pas dans la liste mise à jour
        DB::table('product_command')
            ->where('command_id', $command->id)
            ->whereNotIn('product_id', $updatedProductIds)
            ->delete();
        // incDevisNumerotation();
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = Command::findOrFail($request->id);
        if ($object->status != 'Validé') {
            $object->delete();
            return response()->json([
                'success' => true,
                'message' => trans('translation.commands_message_delete'),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'vous ne pouvez pas supprimer cet commande car il est accepté',
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

        $pdf = PDF::loadView('command.command_pdf', $object);
        $filename = $object['command_code'] . '_' . now()->format('YmdHis') . '.pdf';
        return $pdf->download($filename);
    }
}
