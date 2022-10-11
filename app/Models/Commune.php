<?php

namespace App\Models;

use App\Models\Ceb;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idcommune
 * @property integer $idprovince
 * @property string $libcommune
 * @property integer $superficie
 * @property string $created_at
 * @property string $updated_at
 * @property Province $province
 * @property Csp[] $csps
 * @property Ceb[] $cebs
 */
class Commune extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'commune';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idcommune';

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
    // protected $fillable = ['idprovince', 'libcommune', 'superficie', 'created_at', 'updated_at'];
    protected $guarded =[];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'idprovince', 'idprovince');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function csps()
    {
        return $this->hasMany('App\Models\Csp', 'idcommune', 'idcommune');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cebs()
    {
        return $this->hasMany(Ceb::class, 'idcommune', 'idcommune');
    }
}
