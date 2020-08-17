<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\CategeoryVideo\CategoryVideoRepository;
use Illuminate\Http\Request;

class GetAllCategoryVideo extends Controller
{
    /**
     * Get All CategoryLibrary.
     *
     * @return void
     */
    public function __invoke(CategoryVideoRepository $repository)
    {
        return $this->apiResponse($repository->all()->map(function ($model) {
            return [
                'id' => $model->id,
                'text' => VarByLang(getData(collect($model), "name")),
            ];
        }));
    }
}
