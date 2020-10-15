<?php


namespace App\Services;


use App\Repositories\Eloquent\EventAttend\EventAttendRepository;

class AttendEvent
{
    private $repository ="";
    /**
     * @param EventAttendRepository $repository
     */
    public function __construct(EventAttendRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\AttendEvent
     */
    public function store($request) : \App\AttendEvent
    {
        $data = $request->all();

        $data['type']='registerd';

        $object_created = $this->repository->create($data);

        return $object_created;
    }
}
