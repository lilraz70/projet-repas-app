<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idcommune
 * @property integer $idceb
 * @property string $libceb
 * @property string $created_at
 * @property string $updated_at
 * @property Commune $commune
 */
class Ceb extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ceb';

    /**
     * @var array
     */
    // protected $fillable = [ 'idceb', 'idcommune','libceb', 'created_at', 'updated_at'];
    protected $guarded =[];
    protected $primaryKey = 'idceb';
    // public $incrementing = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commune()
    {
        return $this->belongsTo('App\Models\Commune', 'idcommune', 'idcommune');
    }
}
