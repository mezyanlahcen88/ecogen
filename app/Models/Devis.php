<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Devis extends Model
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
             'devis_code' => 'devis_code',
             'ht' => 'ht',
             'tva' => 'tva',
             'tttc' => 'tttc',
             'status' => 'status',
             'status_date' => 'status_date',
             'client_id' => 'client_id',

         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
            'devis_code' => 'devis_code',
            'ht' => 'ht',
            'tva' => 'tva',
            'tttc' => 'tttc',
            'status' => 'status',
            'status_date' => 'status_date',
            'client_id' => 'client_id',
          ];
          }




}
