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

public function products()
{
    return $this->belongsToMany(Product::class)
        ->withPivot(['quantity', 'price', 'remise', 'total_remise', 'TOTAL_HT', 'TVA', 'TOTAL_TVA', 'TOTAL_TTC', 'unite']);
}



    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
    *
    */

    public function getRowsTable(){
        return [
             'devis_code' => 'devis_code',
             'HT' => 'ht',
             'TVA' => 'tva',
             'TTTC' => 'tttc',
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
