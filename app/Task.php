<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description', 'date', 'time', 'type'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
