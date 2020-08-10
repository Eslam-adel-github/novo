<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('login', 'SAC\LoginView')->name("login");
//Route::post('/login', 'SAC\Login')->name("login_admin");
/*
Route::middleware(\App\Http\Middleware\AdminMiddleware::class, \App\Http\Middleware\LanguageMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('backend.home.admin');
    });
});
*/
Auth::routes(["register"=>false]);
Route::redirect('/','admin',302);

Route::get('/change-lang/{lang}', 'SAC\ChangeLanguage')->name('lang.change');

//Route::get('/home', 'HomeController@index')->name('home');
