<?php


namespace App\Repositories\Eloquent\EventAttend;


use App\AttendEvent;
use App\Repositories\Abstracts\RepositoryAbstract;

class eloquantEventAttendRepository extends RepositoryAbstract implements EventAttendRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return AttendEvent::class;
    }
}
