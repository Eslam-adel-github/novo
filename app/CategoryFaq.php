<?php

namespace App;

class CategoryFaq extends Translatable
{
    protected $fillable=["name"];

    protected $translatable=[
        'name'
    ];
}
