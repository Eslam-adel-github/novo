<?php

namespace App\Http\Controllers\Admin\SAC;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Speciality\SpecialityRepository;

class GetAllSpecialty extends Controller
{
    /**
     * Get All Specialty.
     *
     * @return void
     */
    public function __invoke(SpecialityRepository $repository)
    {
        return $this->apiResponse($repository->all()->map(function ($model) {
            return [
                'id' => $model->id,
                'text' => VarByLang(getData(collect($model),"name")),
            ];
        }));
    }
}
