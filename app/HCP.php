<?php

namespace App;

class HCP extends Translatable
{
    protected $fillable = [
        "name",
        "notes",
        "contacts",
        "working_hour",
        "latitude",
        "longitude",
        "zoom"
    ];
    protected $translatable = [
        'name',
        'working_hour',
    ];
}
