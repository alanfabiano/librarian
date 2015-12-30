<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use URL;

class SetLanguage
{

    protected $languages = [
        'en', 'es', 'pt-BR'
    ];

    public function handle($request, Closure $next)
    {

    	$browser_lang = explode(',',$request->server->get('HTTP_ACCEPT_LANGUAGE'));
   		$browser_lang = array_shift($browser_lang);

        if( !is_null($request->route()->locale) and in_array( $request->route()->locale,$this->languages ) )
        {
            Session::put('locale', $request->route()->locale);
        }
        return redirect(URL::previous());
    }

}
