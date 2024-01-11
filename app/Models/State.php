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

     /**
     * Get The country for the state
     *
     * @return hasOne
     */
    // chidrens
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function suppliers()
    {
        return $this->hasMany(Supplier::class, );
    }
}
