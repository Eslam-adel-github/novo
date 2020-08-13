<?php


namespace App\Repositories\Eloquent\Event;


use App\Event;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantEventRepository extends RepositoryAbstract implements EventRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return Event::class;
    }
}
