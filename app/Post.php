<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['cover', 'user_id', 'published_at', 'category_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function categories()
    {
        return $this->hasMany('App\Category', 'id');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function lymstyle()
    {
        return $this->hasOne('App\Lymstyle');
    }

    public function legende()
    {
        return $this->hasOne('App\Legende');
    }

    public function published()
    {
        return $this->where('status', true);
    }

    public function views()
    {
        return $this->hasMany('App\View');
    }
    
}
