<?php

namespace App\Http\Controllers;

use App\Dto\PaymentDto;
use App\Models\Payment;
use App\Forms\PaymentForm;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Requests\StorePaymentRequest;

class PaymentController extends Controller
{
    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:payment-list|payment-create|payment-edit|payment-show|payment-delete', ['only' => ['index']]);
        $this->middleware('permission:payment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:payment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:payment-show', ['only' => ['show']]);
        $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
        $this->middleware('permission:payment-restore', ['only' => ['restore']]);
        $this->middleware('permission:payment-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:payment-forse-delete', ['only' => ['forseDelete']]);
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
        $tableRows = (new Payment())->getRowsTable();
        $objects = Payment::get();
        return view('payments.index', compact('tableRows', 'objects'));
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Payment::onlyTrashed()->get();
        $tableRows = (new Payment())->getRowsTableTrashed();
        return view('payments.trashedIndex', compact('tableRows', 'objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $object = new Payment();
        $variable = '';
        return view('payments.create', compact('variable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $validated = $request->validated();
        $object = new Payment();
        $object->id = Str::uuid();
        $object->reglement = $request->reglement;
        $object->compte = $request->compte;
        $object->nature = $request->nature;
        $object->comment = $request->comment;

        if ($request->hasFile('picture')) {
            dealWithPicture($request, $object, 'picture', $request->reglement, 'payments', 'store');
        }
        $object->save();
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = payment::findOrfail($id);
        return view('payments.edit', compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(StorePaymentRequest $request, string $id)
    {
        $validated = $request->validated();
        $object = Payment::findOrFail($id);
        $object->reglement = $request->reglement;
        $object->compte = $request->compte;
        $object->nature = $request->nature;
        $object->comment = $request->comment;

        if ($request->hasFile('picture')) {
            dealWithPicture($request, $object, 'picture', $request->reglement, 'payments', 'update');
        }
        $object->save();
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $object = Payment::findOrFail($request->id)->delete();
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
        $object = Payment::withTrashed()
            ->findOrFail($id)
            ->restore();
        // storeSidebar();
        return redirect()->route('payments.index');
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
        $object = Payment::withTrashed()->findOrFail($id);
        // deletePicture($object,'payments','picture');
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
        $object = Payment::findOrFail($id);
        $object->active = !$object->active;
        $object->save();
        $message = $object->active ? trans('translation.payment_message_activated') : trans('translation.payment_message_inactivated');
        return response()->json(['code' => 200, 'active' => $object->active, 'message' => $message]);
    }
}
