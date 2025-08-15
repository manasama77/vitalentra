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

        // ALWAYS default to Indonesian for first-time visitors
        $locale = 'id';

        // 1. Check URL parameter first (highest priority)
        if ($request->has('lang') && in_array($request->lang, $supportedLocales)) {
            $locale = $request->lang;
        }
        // 2. Check session (if user has previously selected a language)
        elseif (Session::has('locale') && in_array(Session::get('locale'), $supportedLocales)) {
            $locale = Session::get('locale');
        }
        // 3. For first-time visitors: ALWAYS use Indonesian ('id')
        // No browser language detection - Indonesian is the primary language

        // Set locale
        App::setLocale($locale);
        Session::put('locale', $locale);

        return $next($request);
    }
}
