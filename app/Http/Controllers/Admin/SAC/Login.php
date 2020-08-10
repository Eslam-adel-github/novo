<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Login extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    /**
     * Get Admin Login View.
     *
     * @return  Usecomposer require laravel/ui "^1.0" --devr
     */
    public function __invoke(\Illuminate\Http\Request $request)
    {

    }
}
