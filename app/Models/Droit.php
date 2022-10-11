<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $codedroit
 * @property string $libdroit
 * @property string $created_at
 * @property string $updated_at
 */
class Droit extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'droit';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codedroit';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['libdroit', 'created_at', 'updated_at'];
}
