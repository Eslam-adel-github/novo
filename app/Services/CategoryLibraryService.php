<?php


namespace App\Services;


use App\CategoryLibrary;
use App\Repositories\Eloquent\CategoryLibrary\CategoryLibraryRepository;

class CategoryLibraryService
{
    private $repository ="";
    /**
     * @param CategoryLibraryRepository $repository
     */
    public function __construct(CategoryLibraryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CategoryLibrary
     */
    public function store($request) : CategoryLibrary
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
    public function update($request, $id) : CategoryLibrary
    {
        $data = $request->all();

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }

}
