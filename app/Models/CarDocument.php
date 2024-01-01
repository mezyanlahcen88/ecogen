<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarDocument extends Model
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

/**
 * Get all of the comments for the Car
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function car()
{
    return $this->belongsTo(Car::class, 'car_id', 'id');
}

    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
    *
    */

    public function getRowsTable(){
        return [
             'nature' => 'nature',
             'start_date' => 'start_date',
             'end_date' => 'end_date',
             'tranche' => 'tranche',

         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
            'nature' => 'nature',
            'start_date' => 'start_date',
            'end_date' => 'end_date',
            'tranche' => 'tranche',
          ];
          }

}
