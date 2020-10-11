<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Specialty\SpecialtyCollection;
use App\Repositories\Eloquent\Speciality\SpecialityRepository;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct(SpecialityRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the incoming request.
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data=$this->repository->instance()->orderBy("id","desc")->get();
        return $this->apiResponse(new SpecialtyCollection($data), true, 200);
    }
}
