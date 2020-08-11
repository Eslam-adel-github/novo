<?php

namespace App;

class TempleteEvent extends Translatable
{
    protected $fillable = [
        "templete_name",
        "event_name",
        "event_description",
        "event_type_id",
        "tags",
        "agenda",
        "image",
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
}
