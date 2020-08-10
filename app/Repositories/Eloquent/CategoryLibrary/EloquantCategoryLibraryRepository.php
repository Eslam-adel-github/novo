<?php


namespace App\Repositories\Eloquent\CategoryLibrary;
use App\CategoryLibrary;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantCategoryLibraryRepository extends RepositoryAbstract implements CategoryLibraryRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return CategoryLibrary::class;
    }
}
