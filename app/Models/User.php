<?php

namespace App\Models;


use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
 use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'password',
        'active',
        'roles_name',
    ];



     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];

 public function isSuperAdmin()
    {
        return $this->super_admin;
    }

//  put the relation of this Model Here






}
