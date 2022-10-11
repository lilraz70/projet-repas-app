<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddispos
 * @property integer $idecole
 * @property string $libdispos
 * @property int $quantite
 * @property string $created_at
 * @property string $updated_at
 */
class Dispositifhyg extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'dispositifhyg';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddispos';
        /**
     * @var array
     */
    // protected $fillable = ['idecole', 'libdispos', 'quantite', 'created_at', 'updated_at'];
    protected $guarded = [];

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    public function ecole()
    {
        return $this->belongsTo('App\Models\ecole', 'idecole', 'idecole');
    }


}
