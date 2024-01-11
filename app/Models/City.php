<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state_id',
        'country_id',
        'country_code',
    ];

    /**
     * Get The state for the city
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    // chidrens
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class, );
    }
}
