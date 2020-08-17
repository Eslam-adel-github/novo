<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryVideo extends Translatable
{
    protected $table="category_videos";

    protected $fillable=["name"];

    protected $translatable=[
        'name'
    ];
}
