<?php

namespace App;

class RethinkObesity extends Translatable
{
    protected $fillable=["name","hyper_link"];

    protected $translatable=[
        'name'
    ];

}
