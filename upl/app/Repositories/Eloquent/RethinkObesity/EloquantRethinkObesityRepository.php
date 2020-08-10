<?php


namespace App\Repositories\Eloquent\RethinkObesity;


use App\Repositories\Abstracts\RepositoryAbstract;
use App\RethinkObesity;

class EloquantRethinkObesityRepository extends RepositoryAbstract implements RethinkObesityRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return RethinkObesity::class;
    }
}
