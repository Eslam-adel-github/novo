<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeding::class);
        $this->call(RethinkObesitySeeder::class);
        $this->call(YoutubeHyperLinkSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
