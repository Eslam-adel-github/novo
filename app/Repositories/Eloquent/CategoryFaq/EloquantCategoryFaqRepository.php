<?php


namespace App\Repositories\Eloquent\CategoryFaq;


use App\CategoryFaq;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantCategoryFaqRepository extends RepositoryAbstract implements CategoryFaqRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return CategoryFaq::class;
    }
}
