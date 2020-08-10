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

Route::get('/get_youtube_video_hyper_link','YoutubeVideoController')->name('youtube.video.hyper_link');
Route::get('/get_rethink_obesity_hyper_link','RethinkObesityController')->name('youtube.video.hyper_link');
