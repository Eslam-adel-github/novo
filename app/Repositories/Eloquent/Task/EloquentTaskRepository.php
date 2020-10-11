<?php


namespace App\Repositories\Eloquent\Task;


use App\Repositories\Abstracts\RepositoryAbstract;
use App\Task;

class EloquentTaskRepository extends RepositoryAbstract implements TaskRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return Task::class;
    }
}
