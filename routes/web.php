<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('language/{locale}', [\App\Http\Controllers\LocaleController::class, 'setLocale'])
    ->name('language.switch');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/teste', function (Request $request) {
    function getLanguage($language) {
        switch ($language) {
            case 'pt_BR':
                return 'pt-br';

            default: return $language;
        }
    }

    return getLanguage($request->getPreferredLanguage(config('app.languages')));
});
