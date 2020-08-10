<?php

namespace App\Repositories\Eloquent\User;

use App\User;


use App\Repositories\Abstracts\RepositoryAbstract;

class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{
    /**
     * The Repository Entity.
     *
     * @return stdClass
     */
    public function entity():string
    {
        return User::class;
    }
}
