<?php

use Illuminate\Database\Seeder;

class YoutubeHyperLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\YoutubeVideo::class,5)->create();
    }
}
