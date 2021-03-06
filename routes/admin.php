<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', 'SAC\LoginView')->name("login");
Route::middleware([AdminMiddleware::class, LanguageMiddleware::class])->group(function () {

    Route::get('/dashboard', 'SAC\Dashboard')->name('dashboard');
    Route::resource('/users', 'Resource\UsersController');
    Route::resource('/rethink_obesity', 'Resource\RethinkObesityController');
    Route::resource('/video_library', 'Resource\YoutubeVideoController');
    //Route::resource('/video_library', 'Resource\YoutubeVideoController');
    Route::resource('/category_library', 'Resource\CategoryLibraryController');
    Route::resource('/faq_category', 'Resource\CategoryFaqController');
    Route::resource('/faq', 'Resource\FaqController');
    Route::get('/category_faq_all', 'SAC\GetAllCategoryFaq')->name('category_faq.all');
    Route::resource('/library', 'Resource\LibraryController');
    Route::get('/category_library_all', 'SAC\GetAllCategoryLibrary')->name('category_library.all');

    Route::resource('/HCP', 'Resource\HCPController');
    Route::resource('/pharmacy', 'Resource\PharmacyController');
    Route::resource('/event_type', 'Resource\EventTypeController');
    Route::resource('/templete_event', 'Resource\TempleteEventController');
    Route::resource('/event', 'Resource\EventController');

    Route::get('/events_type_all', 'SAC\GetAllEventType')->name('events_type.all');
    Route::get('/templete_events_all', 'SAC\GetAllTempleteEvents')->name('templete_events.all');
    Route::get('/templete_event_single/{parameter}', 'SAC\GetSingleTempleteEvent')->name('get_templete_event.single');

    Route::resource('/video_group', 'Resource\CategoryVideoController');
    Route::resource('/specialty', 'Resource\SpecialityController');
    //Route::resource('/category_video', 'Resource\CategoryVideoController');

    Route::get('/category_video_all', 'SAC\GetAllCategoryVideo')->name('category_video.all');

    Route::get("faq_library_cards","SAC\FaqAndLibraryCards")->name('faq_library.cards');
    Route::get("events_cards","SAC\EventsCards")->name('events.cards');
    Route::get("hcp_pharmacy_cards","SAC\HCPAndPharamcyCards")->name('hcp_pharmacy.cards');
    Route::get("video_cards","SAC\VideoCards")->name('video.cards');

    Route::get('/quick_search', 'SAC\QuickSearch')->name('quick_search');
    Route::get('calendar', 'SAC\Calendar')->name("calendar");
    Route::get('/specialty_all', 'SAC\GetAllSpecialty')->name('specialty.all');
    Route::get('get_user_by_speciality/{id}','SAC\GetAllUserBySpecialty')->name('users.speciality');

    Route::get('/website_setting/edit', 'Resource\WebsiteSettingsController@edit')->name('website_settings.edit');
    Route::patch('/website_setting/store', 'Resource\WebsiteSettingsController@store')->name('website_settings.store');

    Route::get('show_invite_to_event/{event_id}','Resource\InviteController@index')->name('show_invite_to_event');
    Route::get('add_invite_to_event/{event_id}','Resource\InviteController@create')->name('add_invite_to_event');
    Route::post('store_invite_to_event','Resource\InviteController@store')->name('store_invite_to_event');

    Route::get('show_register_to_event/{event_id}','SAC\RegisterEventController')->name('show_register_to_event');

    Route::get('get_all_doctors','SAC\GetAllDoctors')->name('get_all_doctors');

    Route::post('change_user_event_status/{id}','SAC\ChangeUserEventStatus')->name('change.user.event.satatus');

    //Route::get('/quick_search', 'SAC\QuickSearch')->name('quick_search');




});
