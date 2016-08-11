<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

	protected $fillable = ['liked', 'user_id', 'post_id'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function isLiked()
    {
        $count  = $this->likes()->where('liked', true)->count();
        
        if($count === 0){
            return (bool) false;
        }
        else{
            return (bool) true;
        }
    }
}
