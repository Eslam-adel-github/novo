<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqAndLibraryCards extends Controller
{
    /**
     * Get Faq and library Cards.
     *
     * @return void
     */
    public function __invoke()
    {
        return view("backend.cards.faq_library", [
            "title"     => trans("main.faq_library_quick_actions"),
        ]);
    }
}
