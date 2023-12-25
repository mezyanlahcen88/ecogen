<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
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
             'product_code' => 'product_code',
             'name_fr' => 'name_fr',
             'name_ar' => 'name_ar',
             'category_id' => 'category_id',
             'scategory_id' => 'scategory_id',

         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
             'name' => 'name',
             'matricule' => 'matricule',
          ];
          }




}
