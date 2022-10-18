<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idmetrepas
 * @property string $libmetrepas
 * @property string $observation
 * @property string $created_at
 * @property string $updated_at
 */
class Metrepas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idmetrepas';

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
    // protected $fillable = ['libmetrepas', 'observation', 'created_at', 'updated_at'];
    protected $guarded = [];
    public function vivres()
    {
        return $this->belongsToMany('App\Models\vivres','ingredient','idmetrepas','idvivre')->withPivot('quantite')->withTimestamps();
    }
    public function plantes()
    {
        return $this->belongsToMany('App\Models\Plante','ingredient','idmetrepas','idplante')->withPivot('quantite')->withTimestamps();
    }
}
