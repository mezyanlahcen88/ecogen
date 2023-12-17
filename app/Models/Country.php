<?php

namespace App\Models;

use App\Models\Client;
use App\Models\CompanyGroupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    //relation pays peut avoir un seul groupe_entreprise
    public function company()
    {
         return $this->hasOne(CompanyGroupe::class);
    }

     public function pickupDeliveryAdresse()
    {
         return $this->hasMany(PickupDeliveryAdresse::class);
    }

    public function clients()
    {
         return $this->hasMany(Client::class);
    }
}
