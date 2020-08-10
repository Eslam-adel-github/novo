<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('lang') && in_array(session()->get('lang'), AppLanguages())) {
            app()->setLocale(session()->get('lang'));
        } else {
            session()->put('lang', GetDefaultLang());
            app()->setLocale(GetDefaultLang());
        }
        return $next($request);
    }
}
