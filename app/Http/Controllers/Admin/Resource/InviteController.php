<?php

namespace App\Http\Controllers\Admin\Resource;

use App\DataTables\EventParticipationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\InviteRequest;
use App\Repositories\Eloquent\Event\EventRepository;
use App\Repositories\Eloquent\User\UserRepository;
use App\Services\InviteToEvent;


class InviteController extends Controller
{
    private $viewPath = 'backend.invite';

    /**
     * @param EventRepository $repository ,
     */
    public function __construct(EventRepository $repository,UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository=$userRepository;
    }

    public function index(EventParticipationDataTable $dataTable,$event_id){
        //return User::whereHas('userEvents')->get();
        $event_name=$this->repository->find($event_id)?VarByLang(getData(collect($this->repository->find($event_id)),"event_name")):"";
        $dataTable->data_model=$this->userRepository->instance()->whereHas('userEventsInvite')->with(['userEventsInvite.event','specaility']);
        //return $dataTable->data_model->get();
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => __('main.show-all') . ' ' . __('main.invites')." ".__('main.to')." ".$event_name,
        ]);
    }

    public function create($event_id)
    {
        $event_name=$this->repository->find($event_id)?VarByLang(getData(collect($this->repository->find($event_id)),"event_name")):"";
        return view("{$this->viewPath}.create", [
            'title' => __('main.add')  . ' ' . __('main.invite')." ". __('main.to')." ".$event_name,
            'event_name'=>$event_name
        ]);
    }
    public function store(InviteRequest $request,InviteToEvent $service){
        $data=$service->store($request);
        return $this->apiResponse($data, true, 200);
    }
}
