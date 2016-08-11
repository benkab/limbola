<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lymstyle extends Model
{
    protected $fillable = ['title', 'slug', 'status', 'body'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}
