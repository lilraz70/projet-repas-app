<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idplante
 * @property integer $idmetrepas
 * @property int $quantite
 * @property string $observation
 * @property string $created_at
 * @property string $updated_at
 */
class Ingredient extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ingredient';
    protected $primaryKey = 'idingredient';

    /**
     * @var array
     */
    
    protected $guarded = [];
    
    public function plante()
    {
        return $this->belongsTo('App\Models\Plante', 'idplante', 'idplante');
    }
    public function metrepas()
    {
        return $this->belongsTo('App\Models\Metrepas', 'idmetrepas', 'idmetrepas');
    }
    public function vivres()
    {
        return $this->belongsTo('App\Models\Vivres', 'idvivre', 'idvivre');
    }
}
