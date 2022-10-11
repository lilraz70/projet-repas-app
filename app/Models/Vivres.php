<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idvivre
 * @property integer $libvivres
 * @property string $created_at
 * @property string $updated_at
 */
class Vivres extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idvivre';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */

    protected $guarded = [];

    /**
     * @var array
     */
    // protected $fillable = ['libvivres', 'created_at', 'updated_at'];
    
}
