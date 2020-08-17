<?php


namespace App\Repositories\Eloquent\CategeoryVideo;


use App\CategoryVideo;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantCategoryVideoRepository extends RepositoryAbstract implements CategoryVideoRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return CategoryVideo::class;
    }
}
