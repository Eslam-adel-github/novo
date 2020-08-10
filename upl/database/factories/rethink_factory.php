<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\RethinkObesity::class, function (Faker $faker) {
    return [
        'name' => json_encode(['ar'=>$faker->name,'en'=>$faker->name]),
        'hyper_link'=>$faker->url,
    ];
});
