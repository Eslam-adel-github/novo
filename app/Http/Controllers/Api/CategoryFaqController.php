<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryFaq\CategoryFaqCollection;
use App\Http\Resources\CategoryLibrary\CategoryLibraryCollection;
use App\Http\Resources\CategoryVideo\CategoryVideoCollection;
use App\Repositories\Eloquent\CategeoryVideo\CategoryVideoRepository;
use App\Repositories\Eloquent\CategoryFaq\CategoryFaqRepository;
use App\Repositories\Eloquent\CategoryLibrary\CategoryLibraryRepository;
use Illuminate\Http\Request;

class CategoryFaqController extends Controller
{
    public function __construct(CategoryFaqRepository $repository)
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
        $data=$this->repository->instance()->orderBy("id","desc")->get();
        return $this->apiResponse(new CategoryFaqCollection($data), true, 200);
    }
}
