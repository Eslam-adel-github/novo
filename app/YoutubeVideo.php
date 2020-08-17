<?php

namespace App;


class YoutubeVideo extends Translatable
{
    protected $fillable=["name","hyper_link",'category_video_id'];

    protected $translatable=[
        'name'
    ];
    public function category()
    {
        return $this->belongsTo(CategoryVideo::class , 'category_video_id');
    }
}
