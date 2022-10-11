<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idplante
 * @property integer $idmetrepas
 * @property integer $idvivre
 * @property string $created_at
 * @property string $updated_at
 */
class Vivreingred extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vivreingred';

    protected $primaryKey = 'idvivreingred';

    /**
     * @var array
     */
    // protected $fillable = ['created_at', 'updated_at'];

    protected $guarded = [];
    public function plante()
    {
        return $this->belongsTo('App\Models\Plante', 'idplante', 'idplante');
    }
    public function metrepas()
    {
        return $this->belongsTo('App\Models\Metrepas', 'idmetrepas', 'idmetrepas');
    }
    public function vivre()
    {
        return $this->belongsTo('App\Models\Vivres', 'idvivres', 'idvivres');
    }
}
