<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idecole
 * @property integer $idceb
 * @property int $idlogin
 * @property integer $libecole
 * @property integer $nbclasse
 * @property string $created_at
 * @property string $updated_at
 * @property Consultation[] $consultations
 * @property Champ[] $champs
 * @property Classeecole[] $classeecoles
 */
class Ecole extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ecole';

    /**
     * @var array
     */
    // protected $fillable = ['idecole', 'idceb', 'idlogin', 'libecole', 'nbclasse', 'created_at', 'updated_at'];
    protected $primaryKey = 'idecole';
    protected $guarded = [];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany('App\Models\Consultation', 'idecole', 'idecole');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function champs()
    {
        return $this->hasMany('App\Models\Champ', 'idecole', 'idecole');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classeecoles()
    {
        return $this->hasMany('App\Models\Classeecole', 'idecole', 'idecole');
    }
    public function ceb()
    {
        return $this->belongsTo('App\Models\Ceb', 'idceb', 'idceb');
    }
}
