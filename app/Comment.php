<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public $timestamps = true;

    public function visit()
    {
        return $this->belongsTo('App\Visit', 'visit_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
