<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id',
    ];


    // chidrens
//relation région  appatient à un pays
    public function country()
    {
        return $this->belongsTo(Country::class);
    }



}
