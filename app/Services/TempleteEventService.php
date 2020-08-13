<?php


namespace App\Services;

use App\Repositories\Eloquent\TempleteEvent\TempleteEventRepository;
use App\TempleteEvent;

class TempleteEventService
{
    private $repository ="";
    /**
     * @param TempleteEventRepository $repository
     */
    public function __construct(TempleteEventRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TempleteEvent
     */
    public function store($request) : TempleteEvent
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
    public function update($request, $id) : TempleteEvent
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

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }
}
