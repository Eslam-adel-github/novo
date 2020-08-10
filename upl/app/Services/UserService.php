<?php

namespace App\Services;

use App\User;

use App\Repositories\Eloquent\User\UserRepository;

use Hash;

class UserService
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return User
     */
    public function store($request) : User
    {
        $data = $request->all();

        $user = $this->userRepository->create($data);

        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return bool
     */
    public function update($request, $id) : User
    {
        $data = $request->all();

        if ($request->has('password') && checkVar($request->password)) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }


        $this->userRepository->update($id, $data);

        return $this->userRepository->find($id);
    }
    public function change_password($request,$id) :User{
        $data['password'] = Hash::make($request->password);
        $user=User::find($id);
        $user->password=$data['password'] ;
        $user->save();
        return $this->userRepository->find($id);
    }
}
