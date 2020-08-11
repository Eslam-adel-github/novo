<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\EventType\EventTypeRepository;
use Illuminate\Http\Request;

class GetAllEventType extends Controller
{
    /**
     * Get All EventType
     *
     * @return void
     */
    public function __invoke(EventTypeRepository $repository)
    {
        return $this->apiResponse($repository->all()->map(function ($model) {
            return [
                'id' => $model->id,
                'text' => VarByLang(getData(collect($model), "name")),
            ];
        }));
    }
}
