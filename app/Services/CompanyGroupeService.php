<?php
namespace App\Services;

use Illuminate\Support\Str;
use App\Models\CompanyGroupe;
use App\Http\Requests\StoreCompanyGroupeRequest;


class CompanyGroupeService{

    public function storeCompanyGroupe(StoreCompanyGroupeRequest $request)
    {

        $validated = $request->validated();
        $object = new CompanyGroupe();
        $object->id = Str::uuid();
        $object->groupe_name = $request->groupe_name;
        $object->adresse = $request->adresse;
        $object->adresse_complement = $request->adresse_complement;
        $object->country_id = $request->country;
        $object->state_id = $request->state;
        $object->city_id  = $request->city ;
        $object->post_code = $request->post_code;
        $object->phone = $request->phone;
        $object->fix = $request->fix;
        $object->fax = $request->fax;
        $object->email = $request->email;
        $object->company_number = $request->company_number;
        $object->vat_number = $request->vat_number;
        $object->isActive = 1;
        $object->currency = $request->currency;
        $object->save();
    }

    public function updateCompanyGroupe(StoreCompanyGroupeRequest $request, $id)
    {
        $validated = $request->validated();
        $object = CompanyGroupe::findOrFail($id);
        $object->groupe_name = $request->groupe_name;
        $object->adresse = $request->adresse;
        $object->adresse_complement = $request->adresse_complement;
        $object->country_id = $request->country;
        $object->state_id = $request->state;
        $object->city_id  = $request->city ;
        $object->post_code = $request->post_code;
        $object->phone = $request->phone;
        $object->fix = $request->fix;
        $object->fax = $request->fax;
        $object->email = $request->email;
        $object->company_number = $request->company_number;
        $object->vat_number = $request->vat_number;
        $object->currency = $request->currency;
        $object->save();

    }

 

}
