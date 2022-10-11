<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $anne
 * @property string $datedebut
 * @property string $datefin
 * @property Production[] $productions
 * @property Consultation[] $consultations
 * @property Eleve[] $eleves
 */
class annescol extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'annescol';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'anne';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    // protected $fillable = ['datedebut', 'datefin'];

    protected $guarded = [];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productions()
    {
        return $this->hasMany('App\Models\Production', 'anne', 'anne');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany('App\Models\Consultation', 'anne', 'anne');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eleves()
    {
        return $this->hasMany('App\Models\Eleve', 'anne', 'anne');
    }
}
