<?php

namespace App;

class CategoryLibrary extends Translatable
{
    protected $fillable=["name"];

    protected $translatable=[
        'name'
    ];

}
