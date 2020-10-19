<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\User\UserRepository;
use Illuminate\Http\Request;

class GetAllDoctors extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserRepository $repository)
    {
        return $this->apiResponse($repository->instance()->where("type",'<>',0)->get()->map(function ($model) {
            return [
                'id' => $model->id,
                'text' =>$model->name,
            ];
        }));
    }
}
