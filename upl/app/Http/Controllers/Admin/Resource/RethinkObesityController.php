<?php

namespace App\Http\Controllers\Admin\Resource;

use App\DataTables\RethinkObesityDataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\RethinkObesityRequest;
use App\Repositories\Eloquent\RethinkObesity\RethinkObesityRepository;
use App\Services\RethinkObesityService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RethinkObesityController extends Controller
{
    private $viewPath = 'backend.rethink_obesity';

    /**
     * @param RethinkObesityRepository $obesityRepository ,
     * @param RethinkObesityService $rethinkObesityService
     */
    public function __construct(RethinkObesityRepository $rethinkObesityRepository, RethinkObesityService $rethinkObesityService)
    {
        $this->rethinkObesityRepository = $rethinkObesityRepository;
        $this->rethinkObesityService = $rethinkObesityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(RethinkObesityDataTables $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => __('main.show-all') . ' ' . __('main.rethink_obesity'),
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
            'title' => __('main.add') . ' ' . __('main.rethink_obesity'),
            //'vendor_control'=>$vendor_control
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(RethinkObesityRequest $request)
    {
        $store = $this->rethinkObesityService->store($request);
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
        $show = $this->rethinkObesityRepository->find($id);
        if ($show) {
            return view("{$this->viewPath}.show", [
                'title' => __('main.show') . ' ' . __('main.rethink_obesity') . ' : ' . $show->name,
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
        $object = $this->rethinkObesityRepository->find($id);
        if ($object) {
            return view("{$this->viewPath}.edit", [
                'title' => __('main.edit') . ' ' . __('main.rethink_obesity') . ' : ' . $object->name,
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
    public function update(RethinkObesityRequest $request, $id)
    {
        $update = $this->rethinkObesityService->update($request, $id);
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
        $delete = $this->rethinkObesityRepository->delete($id);
        if (!$delete) {
            return $this->apiResponse(__('main.faild_delete'), true, 422);
        }

        return $this->apiResponse(__('main.deleted'), true, 200);
    }
}
