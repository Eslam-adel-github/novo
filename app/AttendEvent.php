<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendEvent extends Model
{
    protected $fillable = [
        "user_id",
        "event_id",
        'type',
        "status",
    ];

    public function event(){
        return $this->belongsTo(Event::class,'event_id','id');
    }
}
