<?php

namespace App;

use phpDocumentor\Reflection\Types\Boolean;

class Event extends Translatable
{
    protected $fillable = [
        "event_name",
        "event_description",
        "event_type_id",
        "tags",
        "agenda",
        "image",
        'event_date',
        "participation",
        "address",
        "latitude",
        "longitude",
        "zoom"
    ];
    protected $translatable = [
        'event_name',
        'event_description',
        'address'
    ];

    /*
     * return event type model
     * */
    public function eventType()
    {
        return $this->belongsTo(EventType::class, "event_type_id", "id");
    }
    public function userAppliedToThisEvent()
    {
        return $this->hasMany(AttendEvent::class, "event_id", "id")->where("user_id",auth()->user()->id);
    }
    public function numberOfAttendance()
    {
        return $this->hasMany(AttendEvent::class, "event_id", "id");
    }
    public function userParticipateInEvent()
    {
        return $this->belongsToMany(User::class,'attend_events',"event_id", "user_id");
    }
}
