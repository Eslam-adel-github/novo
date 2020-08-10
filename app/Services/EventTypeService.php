<?php


namespace App\Services;


use App\EventType;
use App\Repositories\Eloquent\EventType\EventTypeRepository;
use Illuminate\Http\Request;

class EventTypeService
{
    private $repository = "";

    /**
     * @param EventTypeRepository $repository
     */
    public function __construct(EventTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return EventType
     */
    public function store($request): EventType
    {
        $data = $request->all();

        $object_created = $this->repository->create($data);

        return $object_created;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function update($request, $id): EventType
    {
        $data = $request->all();

        $this->repository->update($id, $data);

        return $this->repository->find($id);
    }
}
