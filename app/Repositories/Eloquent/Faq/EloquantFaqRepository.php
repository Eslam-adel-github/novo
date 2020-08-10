<?php


namespace App\Repositories\Eloquent\Faq;


use App\Faq;
use App\Repositories\Abstracts\RepositoryAbstract;

class EloquantFaqRepository extends RepositoryAbstract implements FaqRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return Faq::class;
    }
}
