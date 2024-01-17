<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reglement extends Model
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
             'ref_reg' => 'ref_reg',
             'date_reg' => 'date_reg',
             'amount_reg' => 'amount_reg',
             'mode_reg' => 'mode_reg',
             'nature_reg' => 'nature_reg',
             'parent_type' => 'parent_type',
             'parent_id' => 'parent_id',
         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
            'ref_reg' => 'ref_reg',
            'date_reg' => 'date_reg',
            'amount_reg' => 'amount_reg',
            'mode_reg' => 'mode_reg',
            'nature_reg' => 'nature_reg',
            'parent_type' => 'parent_type',
            'parent_id' => 'parent_id',
          ];
          }




}