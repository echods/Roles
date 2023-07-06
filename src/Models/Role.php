<?php

namespace Echods\Roles\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['handle', 'description'];

    /**
     * Add backwards compatibility.
     */
    protected $appends = ['name'];

    /**
     * The users that belong to the roles.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function getNameAttribute()
    {
        return $this->name;
    }
}
