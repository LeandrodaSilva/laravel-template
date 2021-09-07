<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale(string $locale, Request $request): RedirectResponse
    {
        if (!in_array($locale, config('app.locales'))) {
            abort(400);
        }

        App::setLocale($locale);
        $request->session()->flash('locale', $locale);

        return redirect()->back()->withCookie(cookie('locale', $locale));
    }
}
