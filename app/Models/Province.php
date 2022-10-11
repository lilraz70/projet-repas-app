<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idprovince
 * @property integer $idregion
 * @property string $libprovince
 * @property integer $superficie
 * @property string $created_at
 * @property string $updated_at
 * @property Commune[] $communes
 */
class Province extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'province';

    /**
     * @var array
     */
     protected $guarded = [];
     protected $primaryKey = 'idprovince';

    // protected $fillable = ['idprovince', 'idregion', 'libprovince', 'superficie', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communes()
    {
        return $this->hasMany('App\Models\Commune', 'idprovince', 'idprovince');
    }
    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'idregion', 'idregion');
    }

}
