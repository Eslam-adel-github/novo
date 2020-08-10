<?php

namespace App\Services;

use App\Repositories\Eloquent\RethinkObesity\RethinkObesityRepository;
use App\Repositories\Eloquent\YoutubeVideo\YoutubeVideoRepository;
use App\RethinkObesity;
use App\User;

use App\Repositories\Eloquent\User\UserRepository;

use App\YoutubeVideo;
use Hash;

class YoutubeVideoService
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(YoutubeVideoRepository $youtubeVideoRepository)
    {
        $this->youtubeVideoRepository = $youtubeVideoRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return User
     */
    public function store($request) : YoutubeVideo
    {
        $data = $request->all();

        $youtubeVideoRepository = $this->youtubeVideoRepository->create($data);

        return $youtubeVideoRepository;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return bool
     */
    public function update($request, $id) : YoutubeVideo
    {
        $data = $request->all();
        $this->youtubeVideoRepository->update($id, $data);

        return $this->youtubeVideoRepository->find($id);
    }
}
