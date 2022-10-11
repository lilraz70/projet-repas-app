<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $idclasse
 * @property int $anne
 * @property int $idusers
 * @property int $nbfille
 * @property int $nbgarcon
 * @property int $nbtotal
 * @property string $created_at
 * @property string $updated_at
 * @property Annescol $annescol
 * @property Classe $classe
 * @property User $user
 */
class eleve extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'eleve';

    /**
     * @var array
     */
    protected $fillable = ['idusers', 'nbfille', 'nbgarcon', 'nbtotal', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annescol()
    {
        return $this->belongsTo('App\Annescol', 'anne', 'anne');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classe()
    {
        return $this->belongsTo('App\Classe', 'idclasse', 'idclasse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'idusers');
    }
}
