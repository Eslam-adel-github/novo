<?php

namespace App\Services;

use App\Repositories\Eloquent\RethinkObesity\RethinkObesityRepository;
use App\RethinkObesity;
use App\User;

use App\Repositories\Eloquent\User\UserRepository;

use Hash;

class RethinkObesityService
{
    private $rethinkObesityRepository ="";
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(RethinkObesityRepository $rethinkObesityRepository)
    {
        $this->rethinkObesityRepository = $rethinkObesityRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return User
     */
    public function store($request) : RethinkObesity
    {
        $data = $request->all();

        $rethinkObesityRepository = $this->rethinkObesityRepository->create($data);

        return $rethinkObesityRepository;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return bool
     */
    public function update($request, $id) : RethinkObesity
    {
        $data = $request->all();

        $this->rethinkObesityRepository->update($id, $data);

        return $this->rethinkObesityRepository->find($id);
    }
}
