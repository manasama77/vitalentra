<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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
        // Supported locales
        $supportedLocales = ['id', 'en'];

        // Get locale from session, URL parameter, or browser header
        $locale = null;

        // 1. Check URL parameter first
        if ($request->has('lang') && in_array($request->lang, $supportedLocales)) {
            $locale = $request->lang;
        }
        // 2. Check session
        elseif (Session::has('locale') && in_array(Session::get('locale'), $supportedLocales)) {
            $locale = Session::get('locale');
        }
        // 3. Check browser accept language header
        elseif ($request->hasHeader('Accept-Language')) {
            $acceptLanguage = $request->header('Accept-Language');
            if (str_contains($acceptLanguage, 'en')) {
                $locale = 'en';
            } else {
                $locale = 'id'; // default
            }
        }
        // 4. Default fallback
        else {
            $locale = config('app.locale', 'id');
        }

        // Set locale
        App::setLocale($locale);
        Session::put('locale', $locale);

        return $next($request);
    }
}
