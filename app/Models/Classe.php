<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $idclasse
 * @property string $libclasse
 * @property string $created_at
 * @property string $updated_at
 * @property Classeecole[] $classeecoles
 */
class Classe extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'classe';

    protected $primaryKey='idclasse';

    /**
     * @var array
     */
    // protected $fillable = ['idclasse', 'libclasse', 'created_at', 'updated_at'];

    protected $guarded  = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classeecoles()
    {
        return $this->hasMany('App\Models\Classeecole', 'idclasse', 'idclasse');
    }
   
}
