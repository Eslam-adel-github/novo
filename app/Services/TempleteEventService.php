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
        $data = $request->all();
        if(isset($data['tags'])) {
            $data["tags"]="abss";
            /*
            $normalTags = [];
            foreach ($data['tags'] as $tag) {
                array_push($normalTags, $tag['value']);
            }
            $tags = implode(',', $normalTags);
            $tags = explode(',', $tags);
            $data['tags']=$tags;
            */
        }

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
        $data = $request->all();

        if(isset($data['tags'])) {
            $normalTags = [];

            foreach ($data['tags'] as $tag) {
                array_push($normalTags, $tag['value']);
            }

            $data['tags'] = implode(',', $normalTags);
            $data['tags'] = explode(',', $data['tags']);
        }

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }
}
