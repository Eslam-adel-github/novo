<?php

namespace App\Http\Controllers\SAC;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ChangeLanguage extends Controller
{
    /**
     * Changes The Application Language.
     *
     * @param  string $lang
     * @return RedirectResponse
     */
    public function __invoke(string $lang) : RedirectResponse
    {
        if (in_array($lang, AppLanguages())) {
            session()->put('lang', $lang);
        }
        return redirect()->back();
    }
}
