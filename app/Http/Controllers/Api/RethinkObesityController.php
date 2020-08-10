<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RethinkObesity\RethinkObesityCollection;
use App\Repositories\Eloquent\RethinkObesity\RethinkObesityRepository;

class RethinkObesityController extends Controller
{
    public function __construct(RethinkObesityRepository $repository)
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
        $data=$this->repository->instance()->orderBy("id","desc")->paginate();
        return $this->apiResponse(new RethinkObesityCollection($data), true, 200);
    }
}
