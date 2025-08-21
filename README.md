# Echods Roles

Laravel based roles for Laravel 9+.

## Installing the package

```
composer require echods/roles
```

## For Laravel < 5.8

[See 1.1 Documentation](https://github.com/echods/Roles/blob/1.1.4/README.md)

## Publish config files

Below will publish all files that you can configure.

```
$ php artisan vendor:publish --tag=roles
```

Or you can publish these files individually.

```
$ php artisan vendor:publish --tag=roles-config
$ php artisan vendor:publish --tag=roles-migrations
$ php artisan vendor:publish --tag=roles-seeders
$ php artisan vendor:publish --tag=roles-models
$ php artisan vendor:publish --tag=roles-traits
```

## Modify config file to set roles

Add the roles you need for your application and descriptions in the config file. Also change if you would like big integer migrations or note.

```
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
    ...
```


```
$ php artisan migrate
```

## Run setup for roles

This will fill the database with roles from the config file. If you published the seeder then simply run:

```
$ php artisan db:seed --class=RolesSeeder
```

If you did not publish the seeder then run the following:

```
$ php artisan db:seed --class="EchoDS\\\\Roles\\\\Database\\\\Seeders\\\\RolesSeeder"
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

### Checking Roles

You can check roles of a user from the list of roles you have in the config. For example if you have roles `admin`, `editor`, `employee` then you can do the following. Returns boolean.

```
$user = User::find(1);
$user->isAdmin();
$user->isEditor();
$user->isEmployee();
```

Alternatively you can do the following:

```
$user->hasRole('editor');
```

## Checking for multiple roles

Checking if a user has multiple roles

```
$user->hasRoles(['admin', 'editor']);

// or

$user->hasRoles(['editor', 'admin']);
```

## Attaching a role

```
$user->attachRole('superAdmin');
```
