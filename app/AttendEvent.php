<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendEvent extends Model
{
    protected $fillable = [
        "user_id",
        "event_id",
        "status",
    ];

    public function event(){
        return $this->belongsTo(Event::class,'event_id','id');
    }
}
