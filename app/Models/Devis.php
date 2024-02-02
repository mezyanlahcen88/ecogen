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


public function getDesignation() {
    return $this->name_fr.' | '.$this->name_ar ;
}


//  put the relation of this Model Here

public function products()
{
    return $this->belongsToMany(Product::class,'product_devis')
        ->withPivot(['designation','quantity', 'price', 'remise', 'total_remise', 'TOTAL_HT', 'TVA', 'TOTAL_TVA', 'TOTAL_TTC', 'unite']);
}

/**
 * Get the user that owns the Devis
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function client()
{
    return $this->belongsTo(Client::class, 'client_id', 'id');
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

         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
            'devis_code' => 'devis_code',
            'HT' => 'ht',
            'TVA' => 'tva',
            'TTTC' => 'tttc',
            'status' => 'status',
            'status_date' => 'status_date',
          ];
          }


public function scopeValid($query)
{
    return $query->where('status', 'Validé');
}

public function scopeWait($query)
{
    return $query->where('status', 'En attente');
}

public function scopeRejected($query)
{
    return $query->where('status', 'Rejeté');
}

}
