<?php


namespace App\Repositories\Eloquent\Library;


use App\Library;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantLibraryRepository extends RepositoryAbstract implements LibraryRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return Library::class;
    }
}
