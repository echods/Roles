<?php

namespace Echods\Roles\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * The users that belong to the roles.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}