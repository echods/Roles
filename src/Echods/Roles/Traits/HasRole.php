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
        return $this->belongsToMany('Echods\Roles\Models\Role');
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
     * Assign role to user
     *
     * @param $name
     * @return Boolean|Object
     */
    public function assignRole($name)
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
}