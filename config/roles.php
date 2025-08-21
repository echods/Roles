<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Roles
    |--------------------------------------------------------------------------
    |
    | Here you can setup your default roles to seed your database
    |
    */
    'all' => [
        [
            'handle' => 'admin',
            'description' => 'Administrator role with full access'
        ],
        [
            'handle' => 'editor',
            'description' => 'Editor role with content management access'
        ],
        [
            'handle' => 'user',
            'description' => 'Basic user role with limited access'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Database Configuration
    |--------------------------------------------------------------------------
    |
    | Configure database-related settings for the roles package
    |
    */
    'database' => [
        
        /*
        |--------------------------------------------------------------------------
        | Table Names
        |--------------------------------------------------------------------------
        |
        | Customize the table names used by the roles package
        |
        */
        'tables' => [
            'roles' => 'roles',
            'role_user' => 'role_user',
        ],

        /*
        |--------------------------------------------------------------------------
        | Migration Settings
        |--------------------------------------------------------------------------
        |
        | Configure migration behavior
        |
        */
        'migrations' => [
            'use_big_integer' => true,
            'foreign_key_constraints' => true,
        ],

        /*
        |--------------------------------------------------------------------------
        | Model Settings
        |--------------------------------------------------------------------------
        |
        | Configure model behavior
        |
        */
        'models' => [
            'role' => \Echods\Roles\Models\Role::class,
            'user' => \App\Models\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    |
    | Configure caching for better performance
    |
    */
    'cache' => [
        'enabled' => true,
        'store' => null, // Use default cache store
        'prefix' => 'roles',
        'expiration' => 60 * 24, // 24 hours in minutes
    ],

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | Configure middleware for role-based access control
    |
    */
    'middleware' => [
        // 'role' => \Echods\Roles\Middleware\RoleMiddleware::class,
    ],

];
