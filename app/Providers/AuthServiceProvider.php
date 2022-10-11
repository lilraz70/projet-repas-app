<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
            // cree un gate pour autoriser uniquement les administrateurs

        Gate::define("administrateur",function(User $user){
            return $user->hasRole('administrateur');
        });
           // cree un gate pour autoriser uniquement les utilisateurs
            
           Gate::define("utilisateur",function(User $user){
            return $user->hasRole('utilisateur');
        });
    }
}
