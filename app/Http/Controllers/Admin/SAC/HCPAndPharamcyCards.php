<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HCPAndPharamcyCards extends Controller
{
    /**
     * Get hcp and pharmacy Cards.
     *
     * @return void
     */
    public function __invoke()
    {
        return view("backend.cards.hcp_pharmacy", [
            "title"     => trans("main.hcp_pharmacy_quick_actions"),
        ]);
    }
}
