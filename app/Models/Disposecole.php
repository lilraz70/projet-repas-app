<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Disposecole extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'disposecole';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddisposecole';

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
   

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ecole()
    {
        return $this->belongsTo('App\Models\Ecole', 'idecole', 'idecole');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositifhyg()
    {
        return $this->belongsTo('App\Models\Dispositifhyg', 'iddispos', 'iddispos');
    }
}
