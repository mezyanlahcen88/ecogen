<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Garanty extends Model
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
 * Get the user that owns the Garanty
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function client()
{
    return $this->belongsTo(Client::class, 'parent_id', 'id');
}


    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
    *
    */

    public function getRowsTable(){
        return [
            'parent_type' => 'parent_type',
             'amount' => 'amount',
             'type' => 'type',
             'document_ref' => 'document_ref',
         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
            'parent_type' => 'parent_type',
             'amount' => 'amount',
             'type' => 'type',
             'document_ref' => 'document_ref',
          ];
          }




}
