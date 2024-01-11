<?php
namespace App\Services;

use PhpOption\Option;
use App\Models\Client;
use App\Models\Country;
use App\Models\Language;
use App\Models\PaymentTerm;
use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\ShippingAdresse;
use App\Models\PickupDeliveryAdresse;
use App\Http\Requests\StoreClientRequest;

class ParticularService
{
    public function storeParticular(StoreClientRequest $request)
       {
        $validated = $request->validated();
        $object = new Client();
        $object->id = Str::uuid();
        $object->purchassing_manager_phone = $request->purchassing_manager_phone;
        $object->purchassing_manager_email = $request->purchassing_manager_email;
        $object->purchassing_manager_title = $request->purchassing_manager_title;
        $object->purchassing_manager_fname = $request->purchassing_manager_fname;
        $object->purchassing_manager_lname = $request->purchassing_manager_lname;
        $object->billing_address_one = $request->billing_address_one;
        $object->billing_address_two = $request->billing_address_two;
        $object->country_id = $request->country_id;
        $object->state_id = $request->state_id;
        $object->city_id = $request->city_id;
        $object->poste_code = $request->poste_code;
        $object->payment_currency = $request->payment_currency;
        $object->payment_credit_limit = $request->payment_credit_limit;
        $object->language_id = $request->language;
        $object->whatsapp = $request->whatsapp;
        $object->type_client = 'p';
        $object->save();

        $spa = new PickupDeliveryAdresse();
        $spa->id = Str::uuid();
        $spa->address_type = StaticOptions::PICKUP_ADDRESS;
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

    public function updateParticular(StoreClientRequest $request, $id)
    {
        $validated = $request->validated();
            $object = Client::findOrFail($id);
            $object->purchassing_manager_phone = $request->purchassing_manager_phone;
            $object->purchassing_manager_email = $request->purchassing_manager_email;
            $object->purchassing_manager_title = $request->purchassing_manager_title;
            $object->purchassing_manager_fname = $request->purchassing_manager_fname;
            $object->purchassing_manager_lname = $request->purchassing_manager_lname;
            $object->billing_address_one = $request->billing_address_one;
            $object->billing_address_two = $request->billing_address_two;
            $object->country_id = $request->country_id;
            $object->state_id = $request->state_id;
            $object->city_id = $request->city_id;
            $object->poste_code = $request->poste_code;
            $object->payment_currency = $request->payment_currency;
            $object->payment_method_id = $request->payment_method;
            $object->payment_term_id = $request->payment_term;
            $object->payment_credit_limit = $request->payment_credit_limit;
            $object->language_id = $request->language;
            $object->whatsapp = $request->whatsapp;
            $object->save();

    }
    public function searchAll(Request $request,$paginator,$columns,$search)
    {
        $objects = Client::where(function ($query) use ($search ,$columns) {
            foreach ($columns as $column) {
                $query->whereLike($column,$search);
            }
      })->where('type_client', '=', 'p');

        return $objects->paginate($paginator)->withQueryString();
    }
    public function filterClient(Request $request,$paginator)
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
       $objects = $query->where('type_client', 'p')->get();
       return $objects;

    }


}
