<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
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
 * Get all of the comments for the Car
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function documents()
{
    return $this->hasMany(CarDocument::class, 'car_id', 'id');
}


    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
    *
    */

    public function getRowsTable(){
        return [
             'matricule' => 'matricule',
             'marque' => 'marque',
             'type' => 'type',
             'dae' => 'dae',


         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
            'matricule' => 'matricule',
            'marque' => 'marque',
            'type' => 'type',
            'dae' => 'dae',
          ];
          }




}
