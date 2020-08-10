<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryLibrary\CategoryLibraryCollection;
use App\Http\Resources\Library\Library;
use App\Http\Resources\Library\LibraryCollection;
use App\Repositories\Eloquent\CategoryLibrary\CategoryLibraryRepository;
use App\Repositories\Eloquent\Library\LibraryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LibraryController extends Controller
{
    public function __construct(LibraryRepository $libraryRepository, CategoryLibraryRepository $categoryLibraryRepository)
    {
        $this->libraryRepository = $libraryRepository;
        $this->categoryLibraryRepository = $categoryLibraryRepository;
        $this->middleware('auth:api');
    }

    /**
     * Handle the incoming request.
     * @return Response
     */
    public function index(Request $request)
    {
        $category = $this->categoryLibraryRepository->all();
        $library = $this->libraryRepository->instance();
        if ($request->filled("category_id")) {
            $library = $library->where("category_library_id", $request->category_id);
        }
        if ($request->filled("search")) {
            $library = $library->where("title", 'Like', "%" . $request->search . "%");
        }
        $library = $library->orderBy("id", "desc")->paginate();
        $data['category'] = new CategoryLibraryCollection($category);
        $data['libraries'] = new LibraryCollection($library);
        return $this->apiResponse($data, true, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $show = $this->libraryRepository->find($id);
        return $this->apiResponse(new Library($show), true, 200);
    }

}
