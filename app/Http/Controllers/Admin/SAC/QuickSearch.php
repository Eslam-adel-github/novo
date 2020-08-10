<?php

namespace App\Http\Controllers\Admin\SAC;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\View\View;

class QuickSearch extends Controller
{
    /**
     * Get Admin Dashboard View.
     *
     * @return View
     */
    public function __invoke(Request $request) : View
    {
        $query = trim($request->only('query')['query']);

        $routes = [];

        foreach (getAppRoutes() as $route) {
            $routes[] = $route->action['as'];
        }

        $results  = preg_grep('/'.$query.'/i', $routes);

        return view('backend.layout.partials.header-topbar.partials._quick_search_results', [
            'results' => $results
        ]);
    }
}
