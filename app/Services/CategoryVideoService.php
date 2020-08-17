<?php


namespace App\Services;


use App\CategoryVideo;
use App\Repositories\Eloquent\CategeoryVideo\CategoryVideoRepository;

class CategoryVideoService
{
    private $repository ="";
    /**
     * @param CategoryVideoRepository $repository
     */
    public function __construct(CategoryVideoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CategoryVideo
     */
    public function store($request) : CategoryVideo
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
    public function update($request, $id) : CategoryVideo
    {
        $data = $request->all();

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }
}
