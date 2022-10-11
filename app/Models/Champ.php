<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idchamps
 * @property integer $idecole
 * @property string $libchamps
 * @property integer $superficie
 * @property string $typechamps
 * @property string $created_at
 * @property string $updated_at
 * @property Ecole $ecole
 */
class Champ extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idchamps';

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
    // protected $fillable = ['idecole', 'libchamps', 'superficie', 'typechamps', 'created_at', 'updated_at'];

    protected $guarded = [];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ecole()
    {
        return $this->belongsTo('App\Models\Ecole', 'idecole', 'idecole');
    }
}
