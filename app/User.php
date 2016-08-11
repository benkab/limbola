<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ['firstname', 'lastname', 'email', 'avatar', 'password', 'status', 'confirmed', 'confirmToken'];


    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function roles()
    {
    	return $this->belongsToMany('App\Role');
    }

    // Access control roles
    public function hasAnyRole($roles)
    {
    	if(is_array($roles)){
    		foreach ($roles as $role) {
    			if($this->hasRole($role)){
    				return true;
    			}
    		}
    	}else  {	
    		if($this->hasRole($roles)){
    				return true;
    		}
    	}

    	return false;
    }

    public function hasRole($role)
    {
    	if($this->roles()->where('name', $role)->first()){
    		return true;
    	}
    	return false;
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function myFavorites()
    {
        return $this->favorites();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Administrateur')
            {
                return (bool) true;
            }
        }

        return (bool) false;
    }

    public function isRedactor()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Redacteur')
            {
                return (bool) true;
            }
        }

        return (bool) false;
    }

    public function isVisitor()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Visiteur')
            {
                return (bool) true;
            }
        }

        return (bool) false;
    }

}
