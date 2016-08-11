<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['number', 'post_id'];

    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
}
