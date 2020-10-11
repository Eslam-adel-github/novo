<?php

namespace App\Http\Controllers\Admin\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebsiteSettingsRequest;
use App\Repositories\Eloquent\WebSetings\WebsiteSettingRepository;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    /**
     * @var WebsiteSettingRepository
     */
    private $repository;

    /**
     * View Path.
     *
     * @var string
     */
    private $viewPath = 'backend.website_settings';

    /**
     * Resource Route.
     *
     * @var string
     */
    private $resourceRoute = 'website_settings';

    /**
     * Domain Alias.
     *
     * @var string
     */
    private $domainAlias = 'settings';


    /**
     * @param WebsiteSettingRepository $repository
     */
    public function __construct(WebsiteSettingRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $edit = $this->repository->all()->pluck('data', 'key');
        if ($edit) {
            return view("{$this->viewPath}.edit", [
                'title' => __('main.edit') . ' ' . __('main.website_setting'),
                'edit' => $edit,
            ]);
        }
    }

    /**
     * store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsiteSettingsRequest $request)
    {
        $store = $this->repository->store($request->all());
        if (!$store) {
            return $this->apiResponse(__('main.faild_create'), true, 422);
        }
        return $this->apiResponse($store, true, 200);
    }
}
