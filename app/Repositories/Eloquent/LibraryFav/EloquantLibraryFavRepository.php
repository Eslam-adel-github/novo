<?php


namespace App\Repositories\Eloquent\LibraryFav;


use App\LibraryUserFav;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantLibraryFavRepository extends RepositoryAbstract implements LibraryFavRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return LibraryUserFav::class;
    }
}
