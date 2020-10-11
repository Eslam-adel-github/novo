<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Speciality\SpecialityRepository;
use App\Repositories\Eloquent\User\UserRepository;

class GetAllUserBySpecialty extends Controller
{
    /**
     * Get All Specialty.
     *
     * @return void
     */
    public function __invoke($id,UserRepository $repository)
    {
        return $this->apiResponse($repository->instance()->where('specialty_user_id',$id)->get()->map(function ($model) {
            return [
                'id' => $model->id,
                'text' =>$model->name,
            ];
        }));
    }
}
