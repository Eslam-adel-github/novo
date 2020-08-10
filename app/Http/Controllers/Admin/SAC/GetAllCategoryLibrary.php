<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\CategoryLibrary\CategoryLibraryRepository;

class GetAllCategoryLibrary extends Controller
{
    /**
     * Get All CategoryLibrary.
     *
     * @return void
     */
    public function __invoke(CategoryLibraryRepository $repository)
    {
        return $this->apiResponse($repository->all()->map(function ($model) {
            return [
                'id' => $model->id,
                'text' => VarByLang(getData(collect($model), "name")),
            ];
        }));
    }
}
