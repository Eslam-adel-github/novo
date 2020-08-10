<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', 'SAC\LoginView')->name("login");
Route::middleware([AdminMiddleware::class, LanguageMiddleware::class])->group(function () {

    Route::get('/', 'SAC\Dashboard')->name('dashboard');
    Route::resource('/users', 'Resource\UsersController');
    Route::resource('/rethink_obesity', 'Resource\RethinkObesityController');
    Route::resource('/youtube_video', 'Resource\YoutubeVideoController');

});
