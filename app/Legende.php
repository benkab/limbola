<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legende extends Model
{

	protected $fillable = ['firstname', 'lastname', 'status', 'title', 'body', 'slug'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
