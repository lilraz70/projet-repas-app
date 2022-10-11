<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idcommune
 * @property int $idcsp
 * @property int $codecsp
 * @property int $libcsp
 * @property string $created_at
 * @property string $updated_at
 * @property Commune $commune
 * @property Consultation[] $consultations
 */
class Csp extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'csp';

    /**
     * @var array
     */
    // protected $fillable = ['idcommune', 'idcsp', 'codecsp', 'libcsp', 'created_at', 'updated_at'];
    protected $guarded =[];
    protected $primaryKey = 'idcsp';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commune()
    {
        return $this->belongsTo('App\Models\Commune', 'idcommune', 'idcommune');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany('App\Models\Consultation', 'idcsp', 'idcsp');
    }
}
