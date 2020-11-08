<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;


class lang
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
        if(session()->has('lang')){
            App::setLocale(session('lang'));
        }else{
            App::setLocale('ar');
        }
        return $next($request);
    }
}
