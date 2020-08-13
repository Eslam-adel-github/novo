<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TempleteEvent\TempleteEventRepository;
use Illuminate\Http\Request;

class GetAllTempleteEvents extends Controller
{
    /**
     * Get All TemleteEvent
     *
     * @return void
     */
    public function __invoke(TempleteEventRepository $repository)
    {
        return $this->apiResponse($repository->all()->map(function ($model) {
            return [
                'id' => $model->id,
                'text' => $model->templete_name,
            ];
        }));
    }
}
