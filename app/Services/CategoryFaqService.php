<?php


namespace App\Services;


use App\CategoryFaq;
use App\CategoryLibrary;
use App\Repositories\Eloquent\CategoryFaq\CategoryFaqRepository;

class CategoryFaqService
{
    private $repository ="";
    /**
     * @param CategoryFaqRepository $repository
     */
    public function __construct(CategoryFaqRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CategoryLibrary
     */
    public function store($request) : CategoryFaq
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
    public function update($request, $id) : CategoryFaq
    {
        $data = $request->all();

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }

}
