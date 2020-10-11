<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\WebSetings\WebsiteSettingRepository;
use Illuminate\Http\Request;

class WebSettings extends Controller
{
    public function __construct(WebsiteSettingRepository$repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->apiResponse($this->repository->instance()->where("key","about_app")->first(["key",'data']),true, 200);
    }
}
