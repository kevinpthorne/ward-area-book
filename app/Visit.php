<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public $timestamps = true;

    public function person()
    {
        return $this->belongsTo('App\Person','person_id','id');
    }

    public function attendees()
    {
        $this->hasMany('App\User','user_id');
    }
}
