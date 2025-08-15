<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch application language
     */
    public function switch(Request $request, $locale)
    {
        // Supported locales
        $supportedLocales = ['id', 'en'];

        // Validate locale
        if (!in_array($locale, $supportedLocales)) {
            abort(400, 'Language not supported');
        }

        // Set locale in session
        Session::put('locale', $locale);
        App::setLocale($locale);

        // Redirect back to previous page
        return redirect()->back()->with('success', __('Language changed successfully'));
    }
}
