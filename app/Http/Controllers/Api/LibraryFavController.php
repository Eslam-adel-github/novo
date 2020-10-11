<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryFavRequest;
use App\Http\Resources\Library\LibraryCollection;
use App\Library;
use App\Repositories\Eloquent\Library\LibraryRepository;
use App\Repositories\Eloquent\LibraryFav\LibraryFavRepository;
use App\Services\LibraryFav;

class LibraryFavController extends Controller
{
    public function __construct(LibraryFavRepository $repository,LibraryRepository $libraryRepository)
    {
        $this->repository = $repository;
        $this->libraryRepository = $libraryRepository;
        $this->middleware('auth:api');
    }

    /**
     * Handle the incoming request.
     * @return Response
     */
    public function index(Library $library)
    {
        $library = $library->whereHas('userFav')->orderBy("id", "desc")->paginate();

        $data['libraries'] = new LibraryCollection($library);

        return $this->apiResponse($data, true, 200);
    }

    public function store(LibraryFavRequest $request,LibraryFav $service,LibraryFavRepository $repository)
    {
        $request['user_id']=auth()->user()->id;

        $data_to_compare=$request->all();

        if(!$repository->instance()->where($data_to_compare)->exists()) {
            $store = $service->store($request);
            if (!$store) {
                $data["message"] = "Error";
                return $this->apiResponse($data, true, 422);
            }
        }
        $data["message"]="added successfully";
        return $this->apiResponse($data, true, 200);
    }
}
