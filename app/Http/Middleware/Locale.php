<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Locale implements Middleware
{
    public function handle($request, Closure $next)
    {
        if (Session::has('appLocale') AND array_key_exists(Session::get('appLocale'), Config::get('languages')))
        {
            App::setLocale(Session::get('appLocale'));
        }
        else
        { // This is optional as Laravel will automatically set the fallback language if there is none specified
            App::setLocale(Config::get('app.fallback_locale'));
        }

        return $next($request);
    }
}