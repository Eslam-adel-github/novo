<?php


namespace App\Services;
use App\Repositories\Eloquent\Task\TaskRepository;
use App\Task;

class TaskService
{
    private $repository ="";
    /**
     * @param TaskRepository $repository
     */
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Task
     */
    public function store($request) : Task
    {
        $data = $request->all();

        $data["user_id"]=auth()->user()->id;

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
    public function update($request, $id) : Task
    {
        $data = $request->all();

        $data["user_id"]=auth()->user()->id;

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }
}
