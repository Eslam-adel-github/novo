<?php


namespace App\Services;

use App\CategoryLibrary;
use App\Faq;
use App\Repositories\Eloquent\Faq\FaqRepository;

class FaqService
{
    private $repository ="";
    /**
     * @param FaqRepository $repository
     */
    public function __construct(FaqRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CategoryLibrary
     */
    public function store($request) : Faq
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
    public function update($request, $id) : Faq
    {
        $data = $request->all();

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }

}
