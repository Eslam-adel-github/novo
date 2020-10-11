<?php


namespace App\Services;
use App\Repositories\Eloquent\Speciality\SpecialityRepository;
use App\Specialty;

class SpecialtyService
{
    private $repository ="";
    /**
     * @param SpecialityRepository $repository
     */
    public function __construct(SpecialityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  Specialty
     */
    public function store($request) : Specialty
    {
        $data = $request->all();

        $object_created = $this->repository->create($data);

        return $object_created;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return bool
     */
    public function update($request, $id) : Specialty
    {
        $data = $request->all();

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }

}
