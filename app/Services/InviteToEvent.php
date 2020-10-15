<?php


namespace App\Services;


use App\Events\SendInvitEnvent;
use App\Repositories\Eloquent\Event\EventRepository;
use App\Repositories\Eloquent\EventAttend\EventAttendRepository;
use App\Repositories\Eloquent\User\UserRepository;

class InviteToEvent
{
    private $repository ="";
    /**
     * @param EventAttendRepository $repository
     */
    public function __construct(EventAttendRepository $eventAttendRepository,EventRepository $eventRepository,UserRepository $userRepository)
    {
        $this->eventAttendRepository      = $eventAttendRepository;
        $this->eventRepository = $eventRepository;
        $this->userRepository=$userRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\AttendEvent
     */
    public function store($request)
    {
        $data = $request->all();

        $event=$this->eventRepository->find($data['event_id']);

        if($data['type']=="Specialty"){
           $users=$this->userRepository->instance()->where("specialty_id",$data['specialty_id']);
           $users_id=$users->pluck('id')->toArray();
           $users=$users->get();
           $object=$event->userParticipateInEvent()->sync($users_id);
        }
        else{
            $users=$this->userRepository->instance()->whereIn("id",$data['doctors_id'])->get();
            $object=$event->userParticipateInEvent()->where('type','invited')->sync($data['doctors_id']);
        }

        event(new SendInvitEnvent($users,$event));

        return $object;
    }
}
