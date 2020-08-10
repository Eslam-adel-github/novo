<?php


namespace App\Services;


use App\HCP;
use App\Pharmacy;
use App\Repositories\Eloquent\HCP\HCPRepository;
use App\Repositories\Eloquent\Pharmacy\PharmacyRepository;

class PharmacyService
{
    private $repository ="";
    /**
     * @param PharmacyRepository $repository
     */
    public function __construct(PharmacyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return HCP
     */
    public function store($request) : Pharmacy
    {
        $data = $request->all();

        $data['contacts'] = isset($data['contacts']) ? json_encode(array_filter($data['contacts'])) : json_encode([]);

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
    public function update($request, $id) : Pharmacy
    {
        $data = $request->all();

        $data['contacts'] = isset($data['contacts']) ? json_encode(array_filter($data['contacts'])) : json_encode([]);

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }

}
