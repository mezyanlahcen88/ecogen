<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Groupe extends Model
{
    use HasFactory;


    //relation Groupe associè à plusieurs permissions
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
