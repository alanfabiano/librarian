<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;

class BrowserLanguage
{
    public function handle($request, Closure $next)
    {
        
        $browser_lang = explode(',',$request->server->get('HTTP_ACCEPT_LANGUAGE'));
        $browser_lang = array_shift($browser_lang);
        
        if( !Session::has('locale') )
        {
            Session::put('locale', $browser_lang);
        }

        App::setLocale( Session::get('locale') );
        
        return $next($request);
    }
}
