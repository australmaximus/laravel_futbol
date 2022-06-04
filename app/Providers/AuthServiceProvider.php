<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // Gates -> puertas que se abren o se cierran para permitir el acceso a una parte del sistema
        // dependiendo del algoritmo que se establezca

        Gate::define('usuarios-listar', function($usuario){
            // retorna un verdadero o falso para abrir o cerrar la puerta
            return $usuario->rol->nombre == 'Administrador';
        });

        Gate::define('roles-listar', function($usuario){
            return $usuario->rol->nombre == 'Administrador';
        });
    }
}
