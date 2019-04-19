<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $table = 'persons';
    public $timestamps = true;

    public function assignment()
    {
        return $this->belongsToMany("App\Companionship", 'companionship_has_person', 'person_id', 'companionship_id');
    }

    public function visitsReceived()
    {
        return $this->hasMany("App\Visit", "person_id", "id");
    }
}
