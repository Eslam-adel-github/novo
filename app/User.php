<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens ;
        //,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',"phone","gender","type","lat","lang","zoom","prefered_contacts",'specialty_id'
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
    public function specaility(){
        return $this->belongsTo(Specialty::class,"specialty_id");
    }
    public function userEventsInvite()
    {
        return $this->hasMany(AttendEvent::class,"user_id",'id')->where("event_id",request()->route("event_id"))->where("type","invited");

        //return $this->belongsToMany(Event::class,'attend_events', "user_id","event_id");
    }
    public function userEventsRegister()
    {
        return $this->hasMany(AttendEvent::class,"user_id",'id')->where("event_id",request()->route("event_id"))->where("type","registerd");

        //return $this->belongsToMany(Event::class,'attend_events', "user_id","event_id");
    }
}
