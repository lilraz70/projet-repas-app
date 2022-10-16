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
class Enseignant extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'enseignant';

   
    protected $primaryKey = 'annescolaire';
    protected $guarded = [];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany('App\Models\Consultation', 'idecole', 'idecole');
    }

   
    public function ecole()
    {
        return $this->belongsTo('App\Models\Ecole', 'idecole', 'idecole');
    }
}
