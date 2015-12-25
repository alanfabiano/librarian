<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Language
{
    
    public function handle($request, Closure $next)
    {
        App::setLocale('en');
        return $next($request);
    }
}
