<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsCards extends Controller
{

    /**
     * Get Events Cards.
     *
     * @return void
     */
    public function __invoke()
    {
        return view("backend.cards.event", [
            "title"     => trans("main.envents_quick_actions"),
        ]);
    }
}
