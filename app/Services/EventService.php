<?php


namespace App\Services;


use App\Event;
use App\Repositories\Eloquent\Event\EventRepository;

class EventService
{
    private $repository ="";
    /**
     * @param EventRepository $repository
     */
    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Event
     */
    public function store($request) : Event
    {
        if(isset($request['tags'])) {
            $normalTags = [];
            $tags = $request['tags'];
            foreach ($tags as $tag) {
                array_push($normalTags, $tag['value']);
            }
            $request['tags'] = implode(',', $normalTags);
        }

         $data=$request->all();
        $object_created = $this->repository->create($data);

        return $object_created;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return bool
     */
    public function update($request, $id) : Event
    {
        if(isset($request['tags'])) {
            $normalTags = [];
            $tags = $request['tags'];
            foreach ($tags as $tag) {
                array_push($normalTags, $tag['value']);
            }
            $request['tags'] = implode(',', $normalTags);
        }

        $data = $request->all();

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }

}
