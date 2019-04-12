<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companionship extends Model
{
    public $timestamps = true;
    const UPDATED_AT = null;

    public function districts()
    {
        $this->belongsToMany('App\District', 'district_has_companionship',
            'companionship_id', 'district_id')->withTimestamps();
    }

    public function assignments()
    {
        $this->hasMany('App\Person','companionship_id','id');
    }

    public function missionary_1()
    {
        $this->belongsTo('App\User','missionary_1');
    }
    public function missionary_2()
    {
        $this->belongsTo('App\User','missionary_2');
    }
    public function missionary_3()
    {
        $this->belongsTo('App\User','missionary_3');
    }
}
