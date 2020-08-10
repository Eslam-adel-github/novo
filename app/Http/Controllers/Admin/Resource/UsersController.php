<?php

namespace App\Http\Controllers\Admin\Resource;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Repositories\Eloquent\User\UserRepository;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    private $viewPath = 'backend.users';

    /**
     * @param UserRepository $userRepository
     * @param UserService $user
     */
    public function __construct(UserRepository $userRepository, UserService $user)
    {
        $this->userService = $user;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => __('main.show-all') . ' ' . __('main.users'),
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
            'title' => __('main.add') . ' ' . __('main.user'),
            //'vendor_control'=>$vendor_control
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(UsersRequest $request)
    {
        $store = $this->userService->store($request);
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
        $show = $this->userRepository->find($id);
        if ($show) {
            return view("{$this->viewPath}.show", [
                'title' => __('main.show') . ' ' . __('main.user') . ' : ' . $show->name,
                'show' => $show,
            ]);
        }
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        if ($user) {
            $user->roles;
            return view("{$this->viewPath}.edit", [
                'title' => __('main.edit') . ' ' . __('main.user') . ' : ' . $user->name,
                'user' => $user,
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
    public function update(UsersRequest $request, $id)
    {
        $update = $this->userService->update($request, $id);
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
        $user = $this->userRepository->delete($id);
        if (!$user) {
            return $this->apiResponse(__('main.faild_delete'), true, 422);
        }

        return $this->apiResponse(__('main.deleted'), true, 200);
    }
}
