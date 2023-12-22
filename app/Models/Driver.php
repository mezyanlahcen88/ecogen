<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory,SoftDeletes;

     protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';


    public $fillable = [

    ];





//  put the relation of this Model Here


//  put the relation of this Model Here



    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
    *
    */

    public function getRowsTable(){
        return [
             'first_name' => 'first_name',
             'last_name' => 'last_name',
             'cin' => 'cin',
             'permis_number' => 'permis_number',
             'permis_type' => 'permis_type',
             'dob' => 'dob',
         ];
     }


     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'cin' => 'cin',
            'permis_number' => 'permis_number',
            'permis_type' => 'permis_type',
            'dob' => 'dob',
          ];
          }




}
