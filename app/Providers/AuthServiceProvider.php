<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->input('api_token')) {
                return User::where('api_token', $request->input('api_token'))->first();
            }
        });

        Gate::define('atualizar-parametros', function (User $user) {
            return $user->isAdministrador()
                        ? Response::allow()
                        : Response::deny('Você precisa ser um administrador.');
        });
        Gate::define('atualizar-jogos', function (User $user) {
            return ($user->isAdministrador() || $user->isAdministradorConteudo())
                        ? Response::allow()
                        : Response::deny('Você precisa ser um administrador ou administrador de conteudo.');
        });
    }
}
