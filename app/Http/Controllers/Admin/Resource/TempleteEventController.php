<?php

namespace App\Http\Controllers\Admin\Resource;

use App\DataTables\TempleteEventDataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\TemplateEventRequest;
use App\Repositories\Eloquent\TempleteEvent\TempleteEventRepository;
use App\Services\TempleteEventService;
use App\TempleteEvent;
use Illuminate\Http\Request;

class TempleteEventController extends Controller
{
    private $viewPath = 'backend.templete_event';

    /**
     * @param TempleteEventRepository $repository ,
     * @param TempleteEventService $service
     */
    public function __construct(TempleteEventRepository $repository, TempleteEventService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TempleteEventDataTables $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => __('main.show-all') . ' ' . __('main.templete_events'),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("{$this->viewPath}.create", [
            'title' => __('main.add')  . ' ' . __('main.templete_event'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(TemplateEventRequest $request)
    {
        $store = $this->service->store($request);
        if (!$store) {
            return $this->apiResponse(__('main.faild_create'), true, 422);
        }
        return $this->apiResponse($store, true, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $show = $this->repository->find($id);
        if ($show) {
            return view("{$this->viewPath}.show", [
                'title' => __('main.show') . ' ' . __('main.templete_event').' : ' . $show->templete_name,
                'show' => $show,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $object = $this->repository->find($id);
        if ($object) {
            return view("{$this->viewPath}.edit", [
                'title' => __('main.edit') . ' ' . ' ' . __('main.templete_event').' : ' . $object->templete_name,
                'edit' => $object,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(TemplateEventRequest $request, $id)
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
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $delete = $this->repository->delete($id);
        if (!$delete) {
            return $this->apiResponse(__('main.faild_delete'), true, 422);
        }

        return $this->apiResponse(__('main.deleted'), true, 200);
    }
}
