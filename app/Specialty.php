<?php

namespace App;

class Specialty extends Translatable
{
    protected $fillable=["name"];

    protected $translatable=[
        'name'
    ];
}
