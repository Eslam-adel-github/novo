<?php


namespace App\Repositories\Eloquent\EventType;

use App\EventType;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantEventTypeRepository extends  RepositoryAbstract implements EventTypeRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return EventType::class;
    }
}
