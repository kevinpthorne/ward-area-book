<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{

    public const USER_TYPE_NORMAL = 0;
    public const USER_TYPE_LEADER = 1;
    public const USER_TYPE_ROOT = 2;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'user_type', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function visitsAttended()
    {
        $this->belongsToMany('App\Visit','visit_attendees','user_id','visit_id');
    }

    public function districtAssignments()
    {
        $this->hasMany('App\District');
    }

    public function position()
    {
        switch ($this->user_type) {
            case self::USER_TYPE_NORMAL:
                return "Ward Missionary";
            case self::USER_TYPE_LEADER:
                return "Ward Mission Leader";
            case self::USER_TYPE_ROOT:
                return "Ward Comissioner";
        }
        return "Ward Missionary";
    }
}
