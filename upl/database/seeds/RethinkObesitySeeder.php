<?php

use Illuminate\Database\Seeder;

class RethinkObesitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RethinkObesity::class,5)->create();
    }
}
