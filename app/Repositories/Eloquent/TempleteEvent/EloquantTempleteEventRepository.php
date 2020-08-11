<?php


namespace App\Repositories\Eloquent\TempleteEvent;


use App\Repositories\Abstracts\RepositoryAbstract;
use App\TempleteEvent;

class EloquantTempleteEventRepository extends RepositoryAbstract implements TempleteEventRepository
{
    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return TempleteEvent::class;
    }
}
