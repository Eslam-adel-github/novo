<?php


namespace App\Services;


use App\HCP;
use App\Repositories\Eloquent\HCP\HCPRepository;

class HCPService
{
    private $repository ="";
    /**
     * @param HCPRepository $repository
     */
    public function __construct(HCPRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return HCP
     */
    public function store($request) : HCP
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
    public function update($request, $id) : HCP
    {
        $data = $request->all();

        $data['contacts'] = isset($data['contacts']) ? json_encode(array_filter($data['contacts'])) : json_encode([]);

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }

}
