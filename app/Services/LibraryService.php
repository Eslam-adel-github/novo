<?php


namespace App\Services;

use App\CategoryLibrary;
use App\Library;
use App\Repositories\Eloquent\Library\LibraryRepository;

class LibraryService
{
    private $repository ="";
    /**
     * @param LibraryRepository $repository
     */
    public function __construct(LibraryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CategoryLibrary
     */
    public function store($request) : Library
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
    public function update($request, $id) : Library
    {
        $data = $request->all();

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }

}
