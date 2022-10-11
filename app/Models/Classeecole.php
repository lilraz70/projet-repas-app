<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Classeecole extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'classeecole';

    protected $primaryKey = "idclasseecole";

   
    protected $guarded = [];
    public function classe()
    {
        return $this->belongsTo('App\Models\Classe', 'idclasse', 'idclasse');
    }
    public function Ecole()
    {
        return $this->belongsTo('App\Models\Ecole', 'idecole', 'idecole');
    }
}
