<?php


namespace App\Repositories\Eloquent\YoutubeVideo;


use App\Repositories\Abstracts\RepositoryAbstract;
use App\Repositories\Eloquent\YoutubeVideo\YoutubeVideoRepository;
use App\RethinkObesity;
use App\YoutubeVideo;

class EloquantYoutubeVideoRepository extends RepositoryAbstract implements YoutubeVideoRepository
{

    /**
     * @inheritDoc
     */
    public function entity(): string
    {
        return YoutubeVideo::class;
    }
}
