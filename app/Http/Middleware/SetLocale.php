<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $languages = array_keys(config('app.languages'));
        $locale = session('APP_LOCALE');
        $locale = in_array($locale, $languages) ? $locale: config('app.locale');
        app()->setLocale($locale);
        /*$test = app()->getLocale();
        ddd($test);*/
        return $next($request);
    }
}
