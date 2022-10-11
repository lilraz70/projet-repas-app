<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $idrepas
 * @property integer $idchamps
 * @property integer $idplante
 * @property integer $dateproduit
 * @property int $idlogin
 * @property integer $idecole
 * @property integer $idmetrepas
 * @property int $nbrepas
 * @property string $daterepas
 * @property string $moment
 * @property string $observation
 * @property string $created_at
 * @property string $updated_at
 */
class Repas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idrepas';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
 

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $guarded = [];
    
   
    public function production()
    {
        return $this->belongsTo('App\Models\Production', 'idproduction', 'idproduction');
    }
    public function ecole()
    {
        return $this->belongsTo('App\Models\Ecole', 'idecole', 'idecole');
    }
    public function metrepas()
    {
        return $this->belongsTo('App\Models\Metrepas', 'idmetrepas', 'idmetrepas');
    }
    // protected $fillable = ['idchamps', 'idplante', 'dateproduit', 'idlogin', 'idecole', 'idmetrepas', 'nbrepas', 'daterepas', 'moment', 'observation', 'created_at', 'updated_at'];
}
