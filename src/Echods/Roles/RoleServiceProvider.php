<?php

namespace Echods\Roles;

use Illuminate\Support\ServiceProvider;
use Echods\Roles\Console\Commands\GenerateRoles;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load migrations for roles
        $this->loadMigrationsFrom( __DIR__. '/../../migrations' );

        // Publish config
        $this->publishes([
            __DIR__ . '/../../config/roles.php' => config_path('roles.php'),
        ], 'config');

        // Commands
        if ($this->app->runningInConsole()) {

            $this->commands([
                GenerateRoles::class
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
