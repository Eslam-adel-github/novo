<?php

namespace App\Http\Controllers\Admin\Resource;

use App\DataTables\HCPDataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\HCPRequest;
use App\Repositories\Eloquent\HCP\HCPRepository;
use App\Services\HCPService;
use Illuminate\Http\Request;

class HCPController extends Controller
{
    private $viewPath = 'backend.hcp';

    /**
     * @param HCPRepository $repository ,
     * @param HCPService $service
     */
    public function __construct(HCPRepository $repository, HCPService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(HCPDataTables $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => __('main.show-all') . ' ' . __('main.HCP'),
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
            'title' => __('main.add')  . ' ' . __('main.HCP'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(HCPRequest $request)
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
                'title' => __('main.show') . ' ' . __('main.HCP').' : ' . VarByLang(getData(collect($show),"name")),
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
                'title' => __('main.edit') . ' ' . ' ' . __('main.HCP').' : ' . VarByLang(getData(collect($object),"name")),
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
    public function update(HCPRequest $request, $id)
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
