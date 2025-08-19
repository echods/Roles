<?php

namespace Echods\Roles\Traits;

use Echods\Roles\Models\Role;
use Illuminate\Support\Str;

trait HasRole {

    /**
     * Users can have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function roles()
    {
         if($this->table) {
            $joiner = "role_" . Str::singular($this->table);
            $fk = Str::singular($this->table) . "_id";
            return $this->belongsToMany('Echods\Roles\Models\Role', $joiner, $fk)->withTimestamps();
        }
        return $this->belongsToMany('Echods\Roles\Models\Role')->withTimestamps();
    }

    /**
     * Check if user has role
     *
     * @param $handle
     * @return Boolean
     */
    public function hasRole($handle)
    {
        return $this->roles->contains('handle', $handle);
    }

    /**
     * Check if user has role
     *
     * @param $roles
     * @return Boolean
     */
    public function hasRoles(Array $roles)
    {
        sort($roles);

        $userRoles = $this->roles
            ->pluck('handle')
            ->sort()
            ->toArray();

        return $roles == $userRoles;
    }

    /**
     * Attach role to user
     *
     * @param $handle
     * @return Boolean|Object
     */
    public function attachRole($handle)
    {
        if($this->hasRole($handle)) {
            return false;
        }

        $role = Role::where('handle', $handle)->firstOrFail();

        return $this->roles()->save($role);
    }

    /**
     * Detach role to user
     *
     * @param $handle
     * @return Object|Boolean
     */
    public function detachRole($handle)
    {
        if($this->hasRole($handle)) {
            $role = Role::where('handle', $handle)->firstOrFail();
            return $this->roles()->detach($role);
        }
        return false;
    }

    /**
     * Call dynamic method to check role
     *
     * @return Boolean
     */
    public function __call($method, $arguments)
    {
        if(Str::startsWith($method, 'is')) {
            $role = lcfirst(substr($method, 2));
            return $this->hasRole($role);
        }
        return parent::__call($method, $arguments);
    }
}
