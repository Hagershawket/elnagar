<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Config;

use Closure;

class ChangeLanguage
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
       app()->setLocale('ar');

        if(isset($request -> language)  && $request -> language == 'en' )
            app()->setLocale('en');
        return $next($request);  
    }
}
