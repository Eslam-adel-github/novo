<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    public const HOME = 'admin';

    public const AFTERRESETPASSWORD = 'afterResetPassword';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));



        Route::middleware('web')
            ->prefix(config('system.admin.prefix'))
            ->name(config('system.admin.name'))
            ->namespace($this->namespace . '\\Admin')
            ->group(base_path('routes/admin.php'));
         /*
        Route::middleware('web')
            ->prefix(config('system.vendor.prefix'))
            ->name(config('system.vendor.name'))
            ->namespace($this->namespace . '\\Admin')
            ->group(base_path('routes/vendor.php'));
         */

}

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->name('api.')
             ->namespace($this->namespace.'\\Api')
             ->group(base_path('routes/api.php'));
    }
}
