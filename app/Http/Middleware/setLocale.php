<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class setLocale
{
    const LOCALE_KEY = 'locale';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        function getLanguage($language) {
            switch ($language) {
                case 'pt_BR':
                    return 'pt-br';

                default: return $language;
            }
        }

        if ($request->method() === 'GET') {
            if ($request->cookie(self::LOCALE_KEY) && App::getLocale() !== $request->cookie(self::LOCALE_KEY)) {
                $request->session()->put(self::LOCALE_KEY, $request->cookie(self::LOCALE_KEY));
            } elseif (!$request->cookie(self::LOCALE_KEY)) {
                $request->session()->put(self::LOCALE_KEY, getLanguage($request->getPreferredLanguage(config('app.languages'))));
            }

            App::setLocale($request->session()->get(self::LOCALE_KEY));
        }

        return $next($request);
    }
}
