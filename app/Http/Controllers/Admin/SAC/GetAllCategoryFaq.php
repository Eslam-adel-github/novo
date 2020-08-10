<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\CategoryFaq\CategoryFaqRepository;
use Illuminate\Http\Request;

class GetAllCategoryFaq extends Controller
{
    /**
     * Get All CategoryFaq.
     *
     * @return void
     */
    public function __invoke(CategoryFaqRepository $repository)
    {
        return $this->apiResponse($repository->all()->map(function ($model) {
            return [
                'id' => $model->id,
                'text' => VarByLang(getData(collect($model),"name")),
            ];
        }));
    }
}
