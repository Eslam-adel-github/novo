<?php


namespace App\Services;

use App\Repositories\Eloquent\LibraryFav\LibraryFavRepository;

class LibraryFav
{
    private $repository ="";
    /**
     * @param LibraryFavRepository $repository
     */
    public function __construct(LibraryFavRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\LibraryUserFav
     */
    public function store($request) : \App\LibraryUserFav
    {
        $data = $request->all();

        $object_created = $this->repository->create($data);

        return $object_created;
    }
}
