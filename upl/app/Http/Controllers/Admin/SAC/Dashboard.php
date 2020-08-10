<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param
     * @return View
     */
    public function __invoke()
    {
        return view('backend.home.admin',["title"=>trans('main.dashboard')]);
    }
}
