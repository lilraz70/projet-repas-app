<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idregion
 * @property string $libregion
 * @property string $superficie
 * @property string $created_at
 * @property string $updated_at
 */
class Region extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'region';
    protected $primaryKey = 'idregion';
    protected $guarded = [];

    /**
     * @var array
     */
    // protected $fillable = ['idregion', 'libregion', 'superficie', 'created_at', 'updated_at'];
}
