<?php

namespace App;

class EventType  extends Translatable
{
    protected $fillable = [
        "name"
    ];

    protected $translatable = [
        'name'
    ];
}
