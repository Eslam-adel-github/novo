<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoCards extends Controller
{
    /**
     * Get hcp and pharmacy Cards.
     *
     * @return void
     */
    public function __invoke()
    {
        return view("backend.cards.video", [
            "title"     => trans("main.video_quick_actions"),
        ]);
    }
}
