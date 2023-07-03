# Echods Roles

Laravel based roles for Laravel 6+.

## Installing the package

```
composer require echods/roles
```

## For Laravel < 5.8

For Laravel version less than 5.8 please use tag branch 0.9.8

## Publish config file

```
$ php artisan vendor:publish --provider="Echods\Roles\RoleServiceProvider" --tag=config
```

## Modify config file to set roles

Add the roles you need for your application and descriptions in the config file. Also change if you would like big integer migrations or note.

```
'admin' => [
        'name' => 'admin',
        'description' => 'Admin role for all stuff'
    ],

    'editor' => [
        'name' => 'editor',
        'description' => 'Editor role for all stuff'
    ]
],

'migrations' => [

    'useBigInteger' => true

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
