# Echods Roles

## Installing the package

```
composer require echods/roles
```

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

### Checking Roles

You can check roles of a user from the list of roles you have in the config. For example if you have roles `admin`, `editor`, `employee` then you can do the following. Returns boolean.

```
$user = User::find(1);
$user->isAdmin();
$user->isEditor();
$user->isEmployee();
```

Alternatively you can do the follow:

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