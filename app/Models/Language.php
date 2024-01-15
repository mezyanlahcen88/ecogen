<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    // public $timestamps  = false;
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeTranslated($query){
        return $query->where('language_id',1)->first();
    }


    public function users()
    {
        return $this->hasMany(User::class);
    }
    // public function scopeActive($query){
    //     return $query->where('isActive',1);
    // }
}
