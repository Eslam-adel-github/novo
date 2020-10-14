<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/user/register','UserController@store')->name('user.register');
Route::post('/user/login','UserController@login')->name('user.login');
Route::post('/user/forget','UserController@sendResetLinkEmail')->name('reset.email');
Route::get('/user/profile','UserController@profile')->name('user.profile');
Route::patch('/user/update_profile','UserController@updateProfile')->name('user.profile');
Route::post('/user/change_password','UserController@change_password')->name('user.change_password');

Route::get('/get_youtube_video_hyper_link','YoutubeVideoController@index')->name('youtube.video.hyper_link');
Route::get('/get_rethink_obesity_hyper_link','RethinkObesityController')->name('youtube.video.hyper_link');
Route::get('/get_youtube_video_hyper_link_by_category/{category_id}','YoutubeVideoController@videoByCategory')->name('youtube.video.hyper_link_by_category_id');

Route::get('/get_all_library','LibraryController@index')->name('get.library');
Route::get('/get_library_by_id/{id}','LibraryController@show')->name('get.library.by.id');

Route::get('/get_all_faq','FaqController@index')->name('get.library');
Route::get('/get_faq_by_id/{id}','FaqController@show')->name('get.library.by.id');

Route::get('/get_events_page','EventController@index')->name('get.event');
Route::get('/get_event_by_id/{id}','EventController@show')->name('get.event.by.id');
Route::post('/attend_event','EventController@attendEvent')->name('attend_event');
Route::get('/get_events_by_callender','EventController@getEventsByCallender')->name('get.event_by_callender');

Route::post('/images','ImageController@store')->name('uploade.image');

Route::get('/get_youtube_video_category','CategoryVideoController')->name('category_video');

Route::get("/categories/library","CategoryLibraryController");
Route::get("/categories/faqs","CategoryFaqController");
Route::get("/user/events/history","EventController@eventsHistory");
Route::get("/user/fav","LibraryFavController@index");
Route::post("/user/fav","LibraryFavController@store");
Route::apiResource("tasks","TaskController");
Route::get("/specialty","SpecialtyController");
Route::get("/about_app","WebSettings");


