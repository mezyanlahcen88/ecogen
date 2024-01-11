<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
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
 * Get all of the comments for the Client
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function garanties()
{
    return $this->hasMany(Garanty::class, 'parent_id', 'id');
}

//  put the relation of this Model Here



    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
    *
    */

    public function getRowsTable(){
        return [
            'ice' => 'ice',
            'name_ar' => 'name_ar',
            'name_fr' => 'name_fr',
            'phone' => 'phone',
            'email' => 'email',


         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
            'ice' => 'ice',
            'name_ar' => 'name_ar',
            'name_fr' => 'name_fr',
            'phone' => 'phone',
            'email' => 'email',

          ];
          }




}
