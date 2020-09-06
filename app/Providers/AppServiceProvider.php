<?php

namespace App\Providers;

use App\Event;
use App\Repositories\Eloquent\Event\EventRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('backend.home._partials.calendar',function ($view){
            $view->with([ "events"  => Event::all()]);
        });
    }
}
