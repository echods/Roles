<?php

namespace Echods\Roles\Traits;

use Echods\Roles\Models\Role;

trait HasRole {

    /**
     * Users can have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function roles()
    {
        return $this->belongsToMany('Echods\Roles\Models\Role')->withTimestamps();
    }

    /**
     * Check if user has role
     *
     * @param $name
     * @return Boolean
     */
    public function hasRole($name)
    {
        return $this->roles->contains('name', $name);
    }

    /**
     * Check if user has role
     *
     * @param $name
     * @return Boolean
     */
    // public function hasRoles(Array $roles)
    // {
    //     $roles = collect($roles);
    //     $falsey = $roles->each(function ($item, $key) {
    //         if( ! $this->roles->contains('name', $item) ) {
    //             return false;
    //         }
    //     });
    //     return true;
    // }

    /**
     * Attach role to user
     *
     * @param $name
     * @return Boolean|Object
     */
    public function attachRole($name)
    {
        if($this->hasRole($name)) {
            return false;
        }

        $role = Role::where('name', $name)->firstOrFail();

        return $this->roles()->save($role);
    }

    /**
     * Detach role to user
     *
     * @param $name
     * @return Object|Boolean
     */
    public function detachRole($name)
    {
        if($this->hasRole($name)) {
            $role = Role::where('name', $name)->firstOrFail();
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
        if(starts_with($method, 'is')) {
            $role = strtolower(substr($method, 2));
            return $this->hasRole($role);
        }
        return parent::__call($method, $arguments);
    }
}