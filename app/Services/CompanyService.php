<?php
namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Models\PickupDeliveryAdresse;
use App\Http\Requests\StoreCompanyRequest;

class CompanyService
{
    public function storeCompany(StoreCompanyRequest $request)
    {
        $validated = $request->validated();

        $object = new Client();
        $object->id = Str::uuid();
        $object->company_name = $request->company_name;
        $object->company_number = $request->company_number;
        $object->company_vat_number = $request->company_vat_number;
        $object->company_email = $request->company_email;
        $object->company_phone = $request->company_phone;
        $object->company_site_web = $request->company_site_web;
        $object->company_id_client = $request->company_id_client;
        $object->purchassing_manager_phone = $request->purchassing_manager_phone;
        $object->purchassing_manager_email = $request->purchassing_manager_email;
        $object->purchassing_manager_title = $request->purchassing_manager_title;
        $object->purchassing_manager_fname = $request->purchassing_manager_fname;
        $object->purchassing_manager_lname = $request->purchassing_manager_lname;
        $object->accountant_phone = $request->accountant_phone;
        $object->accountant_email = $request->accountant_email;
        $object->accountant_title = $request->accountant_title;
        $object->accountant_name = $request->accountant_name;
        $object->billing_address_one = $request->billing_address_one;
        $object->billing_address_two = $request->billing_address_two;
        $object->country_id = $request->country_id;
        $object->state_id = $request->state_id;
        $object->city_id = $request->city_id;
        $object->poste_code = $request->poste_code;
        $object->payment_currency = $request->payment_currency;
        $object->payment_credit_limit = $request->payment_credit_limit;
        $object->whatsapp = $request->whatsapp;
        $object->type_client = 'c';
        $object->language_id = $request->language;
        $object->save();

        $spa = new PickupDeliveryAdresse();
        $spa->address_type = StaticOptions::PICKUP_ADDRESS;
        $spa->id = Str::uuid();
        $spa->address_fname = $request->purchassing_manager_fname;
        $spa->address_lname = $request->purchassing_manager_lname;
        $spa->address_phone = $request->purchassing_manager_phone;
        $spa->country = $request->country_id;
        $spa->state = $request->state_id;
        $spa->city = $request->city_id;
        $spa->address_zip_code = $request->poste_code;
        $spa->address = $request->billing_address_one;
        $spa->address_complement = $request->billing_address_two;
        $spa->client_id = $object->id;
        $spa->isDefault = 1;
        $spa->save();
    }
    public function updateCompany(StoreCompanyRequest $request, $id)
    {
        $validated = $request->validated();

        $object = Client::findOrFail($id);
        $object->company_name = $request->company_name;
        $object->company_number = $request->company_number;
        $object->company_vat_number = $request->company_vat_number;
        $object->company_email = $request->company_email;
        $object->company_phone = $request->company_phone;
        $object->company_site_web = $request->company_site_web;
        $object->company_id_client = $request->company_id_client;
        $object->purchassing_manager_phone = $request->purchassing_manager_phone;
        $object->purchassing_manager_email = $request->purchassing_manager_email;
        $object->purchassing_manager_title = $request->purchassing_manager_title;
        $object->purchassing_manager_fname = $request->purchassing_manager_fname;
        $object->purchassing_manager_lname = $request->purchassing_manager_lname;
        $object->accountant_phone = $request->accountant_phone;
        $object->accountant_email = $request->accountant_email;
        $object->accountant_title = $request->accountant_title;
        $object->accountant_name = $request->accountant_name;
        $object->billing_address_one = $request->billing_address_one;
        $object->billing_address_two = $request->billing_address_two;
        $object->country_id = $request->country_id;
        $object->state_id = $request->state_id;
        $object->city_id = $request->city_id;
        $object->poste_code = $request->poste_code;
        $object->payment_currency = $request->payment_currency;
        $object->payment_credit_limit = $request->payment_credit_limit;
        $object->whatsapp = $request->whatsapp;
        $object->language_id = $request->language;
        $object->save();
    }

    public function searchAll(Request $request,$paginator,$columns,$search)
    {


        $objects = Client::where(function ($query) use ($search ,$columns) {
                foreach ($columns as $column) {
                    $query->whereLike($column,$search);
                }
          })->where('type_client', '=', 'c');




        return $objects->paginate($paginator)->withQueryString();
    }

    public function filterCompany(Request $request)
    {
        $etrange = ['country_id','payment_term_id','payment_method_id'];
        $searchValues = $request->all();
        $query = Client::query();
        foreach ($searchValues as $column => $value) {
            if($value){
                if(in_array($column, $etrange)){
                    $query->where($column ,$value);
                }
                else{
                    $query->whereRaw("UPPER($column) = ?", [strtoupper($value)]);
                }
            }
        }
       $objects = $query->where('type_client', 'c')->get();
       return $objects;
}

}
