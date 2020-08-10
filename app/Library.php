<?php

namespace App;


class Library extends Translatable
{
    protected $fillable=[
        "title"         ,
        "description"      ,
        "image"            ,
        "category_library_id"  ,
    ];
    protected $translatable=[
        'title'     ,
        'description'  ,
    ];

    /**
     * Get the category associated with the faq.
     */
    public function category()
    {
        return $this->belongsTo(CategoryLibrary::class , 'category_library_id');
    }
}
