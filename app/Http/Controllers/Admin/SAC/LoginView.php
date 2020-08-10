<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LoginView extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    /**
     * Get Admin Login View.
     *
     * @return View
     */
    public function __invoke() : View
    {
        return view('backend.auth.login', [
            'title' => __('main.login'),
        ]);
    }
}
