<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $idclasse
 * @property int $anne
 * @property int $idlogin
 * @property int $nbfille
 * @property int $nbgarcon
 * @property int $nbtotal
 * @property string $created_at
 * @property string $updated_at
 */
class Eleve extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'eleve';
    protected $primaryKey = 'ideleve';
    /**
     * @var array
     */
    // protected $fillable = ['idlogin', 'nbfille', 'nbgarcon', 'nbtotal', 'created_at', 'updated_at'];

    protected $guarded = [];
    public function classe()
    {
        return $this->belongsTo('App\Models\Classe', 'idclasse', 'idclasse');
    }
    public function annescol()
    {
        return $this->belongsTo('App\Models\Annescol', 'anne', 'anne');
    }

}
