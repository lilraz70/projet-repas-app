<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idmedicament
 * @property string $codemedicament
 * @property int $libmedicament
 * @property string $posologie
 * @property string $observation
 * @property string $typemedi
 * @property string $created_at
 * @property string $updated_at
 */
class Medicament extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'medicament';
    protected $guarded = [];

    protected $primaryKey = 'idmedicament';

    /**
     * @var array
     */
    // protected $fillable = ['idmedicament', 'codemedicament', 'libmedicament', 'posologie', 'observation', 'typemedi', 'created_at', 'updated_at'];
}
