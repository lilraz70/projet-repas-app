<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idvivre
 * @property integer $idecole
 * @property string $created_at
 * @property string $updated_at
 */
class Vivresecole extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vivresecole';
    protected $primaryKey = 'idvivresecole';
    /**
     * @var array
     */
    // protected $fillable = ['created_at', 'updated_at'];4

    protected $guarded = [];

    public function vivres()
    {
        return $this->belongsTo('App\Models\Vivres', 'idvivre', 'idvivre');
    }
    public function ecole()
    {
        return $this->belongsTo('App\Models\Ecole', 'idecole', 'idecole');
    }

}
