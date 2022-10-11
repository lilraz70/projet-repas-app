<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $anne
 * @property int $idlogin
 * @property integer $idecole
 * @property int $idcsp
 * @property string $dateconsult
 * @property integer $nbfille
 * @property integer $nbgarcon
 * @property integer $nbtotal
 * @property int $phase
 * @property string $created_at
 * @property string $updated_at
 * @property Annescol $annescol
 * @property Csp $csp
 * @property Ecole $ecole
 * @property Utilisateur $utilisateur
 */
class Consultation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'consultation';
    protected $primaryKey ='idconsultation';

    /**
     * @var array
     */
    // protected $fillable = ['anne', 'idlogin', 'idecole', 'idcsp', 'dateconsult', 'nbfille', 'nbgarcon', 'nbtotal', 'phase', 'created_at', 'updated_at'];
    
    protected $guarded = [];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annescol()
    {
        return $this->belongsTo('App\Models\Annescol', 'anne', 'anne');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function csp()
    {
        return $this->belongsTo('App\Models\Csp', 'idcsp', 'idcsp');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ecole()
    {
        return $this->belongsTo('App\Models\Ecole', 'idecole', 'idecole');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
    // public function soin()
    // {
    //     return $this->belongsTo('App\Models\Soins', 'idsoins', 'idsoins');
    // }
}
