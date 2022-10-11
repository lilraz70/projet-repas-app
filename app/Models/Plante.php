<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idplante
 * @property string $libplante
 * @property string $typeplante
 * @property string $created_at
 * @property string $updated_at
 */
class Plante extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'plante';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idplante';

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
    public $incrementing = false;

    /**
     * @var array
     */
    // protected $fillable = ['libplante', 'typeplante', 'created_at', 'updated_at'];
    protected $guarded = [];
}
