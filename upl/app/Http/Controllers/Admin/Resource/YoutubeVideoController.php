<?php

namespace App\Http\Controllers\Admin\Resource;

use App\DataTables\RethinkObesityDataTables;
use App\DataTables\YoutubeVideoDataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\RethinkObesityRequest;
use App\Http\Requests\YoutubeVideoRequest;
use App\Repositories\Eloquent\RethinkObesity\RethinkObesityRepository;
use App\Repositories\Eloquent\YoutubeVideo\YoutubeVideoRepository;
use App\RethinkObesity;
use App\Services\RethinkObesityService;
use App\Services\YoutubeVideoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class YoutubeVideoController extends Controller
{
    private $viewPath = 'backend.youtube_video';

    /**
     * @param RethinkObesityRepository $obesityRepository ,
     * @param RethinkObesityService $rethinkObesityService
     */
    public function __construct(YoutubeVideoRepository $youtubeVideoRepository, YoutubeVideoService $youtubeVideoService)
    {
        $this->youtubeVideoRepository = $youtubeVideoRepository;
        $this->youtubeVideoService = $youtubeVideoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(YoutubeVideoDataTables $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => __('main.show-all') . ' ' . __('main.youtube_video_hyper_link'),
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
            'title' => __('main.add') . ' ' . __('main.youtube_video_hyper_link'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(YoutubeVideoRequest $request)
    {
        $store = $this->youtubeVideoService->store($request);
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
        $show = $this->youtubeVideoRepository->find($id);
        if ($show) {
            return view("{$this->viewPath}.show", [
                'title' => __('main.show') . ' ' . __('main.youtube_video_hyper_link') . ' : ' . VarByLang(getData(collect($show),"name")),
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
        $object = $this->youtubeVideoRepository->find($id);
        if ($object) {
            return view("{$this->viewPath}.edit", [
                'title' => __('main.edit') . ' ' . __('main.rethink_obesity') . ' : ' . VarByLang(getData(collect($object),"name")),
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
        $update = $this->youtubeVideoService->update($request, $id);
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
        $delete = $this->youtubeVideoRepository->delete($id);
        if (!$delete) {
            return $this->apiResponse(__('main.faild_delete'), true, 422);
        }

        return $this->apiResponse(__('main.deleted'), true, 200);
    }
}
