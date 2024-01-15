<?php
namespace App\Services;

use App\Models\Bank;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBankRequest;
use Illuminate\Support\Facades\Request;

class BankService
{
    public function getBanks()
    {
        return Bank::with('company_groupe')
            ->orderBy('created_at', 'desc')
            ->get();

    }

    public function getBank($id)
    {
        return Bank::findOrFail($id);
    }

    public function StoreBank(StoreBankRequest $request)
    {
        $validated = $request->validated();
        $object = new Bank();
        $object->id = Str::uuid();
        $object->swift_bic = $request->swift_bic;
        $object->iban = $request->iban;
        $object->account_number = $request->account_number;
        $object->sort_code = $request->sort_code;
        $object->ach = $request->ach;
        $object->adresse = $request->adresse;
        $object->adresse_complement = $request->adresse_complement;
        $object->country_id = $request->country_id;
        $object->state_id = $request->state_id;
        $object->city_id = $request->city_id;
        $object->post_code = $request->post_code;
        $object->isActive = 1;
        $object->currency = $request->currency;
        $object->company_groupe_id = $request->company_groupe;
        $object->save();
        Alert()->success('Super', 'bank à été crée avec succée');
        return redirect()->route('banks.index');
    }
    public function UpdateBank(StoreBankRequest $request, $id)
    {
        $validated = $request->validated();

        $bank = $this->getBank($id);
        $object = Bank::findOrFail($id);
        $object->swift_bic = $request->swift_bic;
        $object->iban = $request->iban;
        $object->account_number = $request->account_number;
        $object->sort_code = $request->sort_code;
        $object->ach = $request->ach;
        $object->adresse = $request->adresse;
        $object->adresse_complement = $request->adresse_complement;
        $object->country_id = $request->country_id;
        $object->state_id = $request->state_id;
        $object->city_id = $request->city_id;
        $object->post_code = $request->post_code;
        $object->currency = $request->currency;
        $object->company_groupe_id = $request->company_groupe;
        $object->save();
    }
    public function deleteBank($id)
    {
        $bank = $this->getBank($id);
        $bank->delete();
    }

    public function changeStatus($id)
    {
        $object = $this->getBank($id);
        $object->isActive = !$object->isActive;
        $object->save();
        return $object;
    }

}
