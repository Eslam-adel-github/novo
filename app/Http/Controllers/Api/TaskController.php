<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\Task\Task;
use App\Http\Resources\Task\TaskCollection;
use App\Repositories\Eloquent\Task\TaskRepository;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(TaskRepository $repository,TaskService $service)
    {
        $this->repository = $repository;
        $this->service=$service;
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=$this->repository->instance()->where("user_id",auth()->user()->id)->orderBy("id","desc")->paginate();

       return $this->apiResponse(new TaskCollection($data), true, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $data=$this->service->store($request);

        return $this->apiResponse(new Task($data), true, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=$this->repository->find($id);

        return $this->apiResponse(new Task($data), true, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $update = $this->service->update($request, $id);
        if (!$update) {
            return $this->apiResponse(__('main.faild_update'), true, 422);
        }
        return $this->apiResponse($update, true, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->repository->instance()->where("id",$id)->delete();
        if (!$delete) {
            return $this->apiResponse(__('main.faild_delete'), true, 422);
        }

        return $this->apiResponse(__('main.deleted'), true, 200);
    }
}
