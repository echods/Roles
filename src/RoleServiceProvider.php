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
        $this->loadMigrationsFrom( __DIR__. '/../database/migrations' );

        // Publish config
        $this->publishes([
            __DIR__ . '/../config/roles.php' => config_path('roles.php'),
        ], 'roles-config');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'roles-migrations');

        // Publish seeders
        $this->publishes([
            __DIR__ . '/../database/seeders/' => database_path('seeders'),
        ], 'roles-seeders');

        // Publish models
        $this->publishes([
            __DIR__ . '/Models/' => app_path('Models/'),
        ], 'roles-models');

        // Publish traits
        $this->publishes([
            __DIR__ . '/Traits/' => app_path('Traits/'),
        ], 'roles-traits');

        // Publish all
        $this->publishes([
            __DIR__ . '/../config/roles.php' => config_path('roles.php'),
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
            __DIR__ . '/../database/seeders/' => database_path('seeders'),
            __DIR__ . '/Models/' => app_path('Models/'),
            __DIR__ . '/Traits/' => app_path('Traits/'),
        ], 'roles');

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
        // Merge the package config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/roles.php',
            'roles'
        );
    }
}
