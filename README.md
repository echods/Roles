# Echods Roles

Laravel based roles for Laravel 5.6

## Publish config file

```
$ php artisan vendor:publish --provider="Echods\Roles\RoleServiceProvider" --tag=config
```

## Modify config file to set roles

Add the roles you need for your application and descriptions in the config file

```
'admin' => [
        'name' => 'admin',
        'description' => 'Admin role for all stuff'
    ],

    'editor' => [
        'name' => 'editor',
        'description' => 'Editor role for all stuff'
    ],
]
```

## Run migrations

Run migrations for roles table and role_user to be created.

```
$ php artisan migrate
```

## Run setup for roles

This will fill the database with roles from the config file.

```
$ php artisan roles:generate
```

## HasRole Trait

```

use Echods\Roles\Traits\HasRole;

class User extends Authenticatable
{

    use HasRole;

    //...
}

```

## Usage