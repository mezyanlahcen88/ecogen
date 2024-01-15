<?php
namespace App\Services;

use PhpOption\Option;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PickupDeliveryAdresse;

class AddresseService
{

    public function storeAdresse(Request $request,$typeAdresse)
       {
        $addresse = new PickupDeliveryAdresse();
        $addresse->id = Str::uuid();
        $addresse->address_title = $request->address_title;
        $addresse->address_email = $request->address_email;
        $addresse->address_fname = $request->address_fname;
        $addresse->address_lname = $request->address_lname;
        $addresse->address_phone = $request->address_phone;
        $addresse->country_id = $request->country;
        $addresse->state_id = $request->state;
        $addresse->city_id = $request->city;
        $addresse->address_zip_code = $request->address_zip_code;
        $addresse->address = $request->address;
        $addresse->address_complement = $request->address_complement;
        // $object->whatsapp = $request->whatsapp;
        $addresse->client_id = $request->client_id;
        $addresse->isDefault = 1;
        $addresse->address_type = $typeAdresse;
        $addresse->save();
}

}
