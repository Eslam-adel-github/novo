<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Event\EventRepository;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    /**
     * Get Calender.
     *
     * @return void
     */
    public function __invoke(EventRepository $repository)
    {
        return view("backend.event.calendar", [
            "title"     => trans("main.calendar"),
            "events"  => $repository->all(),
        ]);
    }
}
