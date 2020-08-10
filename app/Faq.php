<?php

namespace App;

class Faq extends Translatable
{
    protected $fillable=[
        "question"         ,
        "description"      ,
        "image"            ,
        "category_faq_id"  ,
    ];
    protected $translatable=[
         'question'     ,
         'description'  ,
    ];

    /**
     * Get the category associated with the faq.
     */
    public function category()
    {
        return $this->belongsTo(CategoryFaq::class , 'category_faq_id');
    }
}
