<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibraryUserFav extends Model
{
    protected $fillable = [
        "user_id",
        "library_id",
    ];
}
