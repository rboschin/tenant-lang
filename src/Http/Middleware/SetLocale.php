<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Session::has('user_lang')) {
            // User profile configuration
            \App::setLocale(\Session::get('user_lang'));
            // \Carbon\Carbon::setLocale(\Session::get('user_lang')); # ??
        } elseif (\Session::has('web_lang')) {
            // Home page choice
            \App::setLocale(\Session::get('web_lang'));
            // \Carbon\Carbon::setLocale(\Session::get('web_lang')); # ??
        } else {
            // Browser default language
            $installedLocales = \LaravelLang\Locales\Facades\Locales::installed()->pluck('code')->toArray();
            $browserLocale = $request->getPreferredLanguage($installedLocales);
            \App::setLocale($browserLocale);
            // \Carbon\Carbon::setLocale($browserLocale); # ??
        }

        return $next($request);
    }
}
