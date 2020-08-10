<?php


namespace App\Repositories\Eloquent\HCP;


use App\HCP;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantHCPRepository extends RepositoryAbstract implements  HCPRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
      return HCP::class;
    }
}
