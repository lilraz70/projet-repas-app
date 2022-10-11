<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idchamps
 * @property integer $idplante
 * @property integer $dateproduit
 * @property int $anne
 * @property int $idlogin
 * @property integer $qteconso
 * @property int $qtevendu
 * @property string $observation
 * @property integer $qteproduit
 * @property string $created_at
 * @property string $updated_at
 */
class Production extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'production';
    protected $primaryKey = 'idproduction';

    /**
     * @var array
     */
    protected $guarded = [];
    public function plante()
    {
        return $this->belongsTo('App\Models\Plante', 'idplante', 'idplante');
    }
    public function champ()
    {
        return $this->belongsTo('App\Models\Champ', 'idchamps', 'idchamps');
    }
    public function annescol()
    {
        return $this->belongsTo('App\Models\annescol', 'anne', 'anne');
    }
    // protected $fillable = ['anne', 'idlogin', 'qteconso', 'qtevendu', 'observation', 'qteproduit', 'created_at', 'updated_at'];
}
