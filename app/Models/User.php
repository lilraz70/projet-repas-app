<?php

namespace App\Models;

use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    // protected $primaryKey = 'id';
    protected $guarded=[];
    public function roles(){
        return $this->belongsToMany(Role::class,"users_roles","user_id","role_id");
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // recuperer l'utilisateur qui a le role passer en paramettre

    public function hasRole($role){
        return $this->roles()->where("nom", $role)->first() !==null;
    }
    // recuperer l'utilisateur qui a au moins 1 des roles qui seront  passer en paramettre
    public function hasAnyRole($role){
        return $this->roles()->whereIn("nom", $role)->first() !==null;
    }

}
