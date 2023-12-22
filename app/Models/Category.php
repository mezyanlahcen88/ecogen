<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
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


/**
 * Get all of the comments for the Category
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function categories()
{
    return $this->hasMany(Category::class, 'parent_id', 'id');
}

/**
 * Get the user that owns the Category
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function category()
{
    return $this->belongsTo(Category::class, 'parent_id', 'id');
}


    /**
     *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
    *
    */

    public function getRowsTable(){
        return [
             'name' => 'name',

         ];
     }

     /**
      *getters pour recuperer les attribute de type file pour l'utiliser dans le crud
     *
     */

     public function getRowsTableTrashed(){
         return [
             'name' => 'name',
          ];
          }




}
