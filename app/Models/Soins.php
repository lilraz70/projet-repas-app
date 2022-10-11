<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idmedicament
 * @property string $dateconsult
 * @property string $created_at
 * @property string $updated_at
 */
class Soins extends Model
{
    /**
     * @var array
     */
    // protected $fillable = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $primaryKey ='idsoins';

    public function medicament()
    {
        return $this->belongsTo('App\Models\Medicament', 'idmedicament', 'idmedicament');
    }
    public function consultation()
    {
        return $this->belongsTo('App\Models\Consultation', 'idconsultation', 'idconsultation');
    }


}
