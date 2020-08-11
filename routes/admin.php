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
    Route::resource('/category_library', 'Resource\CategoryLibraryController');
    Route::resource('/category_common_faq', 'Resource\CategoryFaqController');
    Route::resource('/faq', 'Resource\FaqController');
    Route::get('/category_faq_all', 'SAC\GetAllCategoryFaq')->name('category_faq.all');
    Route::resource('/library', 'Resource\LibraryController');
    Route::get('/category_library_all', 'SAC\GetAllCategoryLibrary')->name('category_library.all');

    Route::resource('/HCP', 'Resource\HCPController');
    Route::resource('/pharmacy', 'Resource\PharmacyController');
    Route::resource('/event_type', 'Resource\EventTypeController');
    Route::resource('/templete_event', 'Resource\TempleteEventController');

    Route::get('/events_type_all', 'SAC\GetAllEventType')->name('events_type.all');
    //Route::get('/quick_search', 'SAC\QuickSearch')->name('quick_search');




});
