<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function isUsed($tag)
    {
    	$count  = $this->posts()->where('tag_id', $tag->id)->count();
    	
    	if($count === 0){
    		return (bool) false;
    	}
    	else{
    		return (bool) true;
    	}
    }
}
