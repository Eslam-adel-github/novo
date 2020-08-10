<?php

namespace App;


class YoutubeVideo extends Translatable
{
    protected $fillable=["name","hyper_link"];

    protected $translatable=[
        'name'
    ];
}
