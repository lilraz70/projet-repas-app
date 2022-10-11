<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Usersroles extends Model
{
    
    protected $table = 'users_roles';

    protected $primaryKey = 'id';

    

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
   
}
