<?php


namespace App\Repositories\Eloquent\Speciality;


use App\Repositories\Abstracts\RepositoryAbstract;
use App\Repositories\Eloquent\RethinkObesity\RethinkObesityRepository;
use App\Specialty;

class EloquantSpecialityRepository extends RepositoryAbstract implements SpecialityRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return Specialty::class;
    }
}
