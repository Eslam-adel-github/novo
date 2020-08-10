<?php


namespace App\Repositories\Eloquent\Pharmacy;


use App\Pharmacy;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantPharmacyRepository extends RepositoryAbstract implements PharmacyRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return Pharmacy::class;
    }
}
