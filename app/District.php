<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = true;

    public function companionships()
    {
        return $this->hasMany('App\Companionship','district_id', 'id');
    }

    public function districtLeader()
    {
        return $this->belongsTo('App\User');
    }
}
