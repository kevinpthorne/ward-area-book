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
        return $this->belongsToMany('App\User', 'visit_attendees','visit_id','user_id');
    }
}
