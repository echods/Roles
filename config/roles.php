<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    |
    | Here you can setup your roles to first seed your database
    |
    */
    'all' => [

        [
            'handle' => 'admin',
            'description' => 'Admin role for all stuff'
        ],

        [
            'handle' => 'editor',
            'description' => 'Editor role for all stuff'
        ],
    ],

    'migrations' => [

        'useBigInteger' => true

    ]

];
