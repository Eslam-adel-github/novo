<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryVideo\CategoryVideoCollection;
use App\Repositories\Eloquent\CategeoryVideo\CategoryVideoRepository;
use Illuminate\Http\Request;

class CategoryVideoController extends Controller
{
    public function __construct(CategoryVideoRepository $repository)
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
        return $this->apiResponse(new CategoryVideoCollection($data), true, 200);
    }
}
