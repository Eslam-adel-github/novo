<?php

namespace App\Http\Controllers\Admin\SAC;

use App\DataTables\EventParticipationDataTable;
use App\DataTables\RegisterdEventDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Event\EventRepository;
use App\Repositories\Eloquent\User\UserRepository;
use App\User;
use Illuminate\Http\Request;

class RegisterEventController extends Controller
{
    private $viewPath = 'backend.register_event';

    /**
     * @param EventRepository $repository ,
     */
    public function __construct(EventRepository $repository,UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository=$userRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EventParticipationDataTable $dataTable,$event_id)
    {
        $event_name=$this->repository->find($event_id)?VarByLang(getData(collect($this->repository->find($event_id)),"event_name")):"";
        $dataTable->data_model=$this->userRepository->instance()->whereHas('userEventsRegister')->with('userEventsRegister');
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => __('main.show-all') . ' ' . __('main.registers')." ".__('main.to')." ".$event_name,
        ]);
    }
}
