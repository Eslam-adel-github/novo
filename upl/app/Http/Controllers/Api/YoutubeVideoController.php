<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\YoutubeVideo\YoutubeVideoCollection;
use App\Repositories\Eloquent\YoutubeVideo\YoutubeVideoRepository;

class YoutubeVideoController extends Controller
{
    public function __construct(YoutubeVideoRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
    }
    /**
     * Handle the incoming request.
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data=$this->repository->instance()->orderBy("id","desc")->paginate();;
        return $this->apiResponse(new YoutubeVideoCollection($data), true, 200);
    }
}
