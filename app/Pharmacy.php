<?php

namespace App;


class Pharmacy extends Translatable
{
    protected $table='pharmacies';

    protected $fillable = [
        "name",
        "notes",
        "contacts",
        "working_hour",
        "latitude",
        "longitude",
        "zoom",
        "image"
    ];
    protected $translatable = [
        'name',
        'working_hour',
    ];
}
