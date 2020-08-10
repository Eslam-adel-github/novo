<?php

use Illuminate\Database\Seeder;
use App\Helpers\Classes\UserType;
use App\User;

class UserTableSeeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = [
            'name' => 'admin',
            'email' => 'admin@ibraintechs.com',
            'phone' => '1234567859',
            'password' => bcrypt('password'),
            'image'=>'http://lorempixel.com/640/480/',
            'type'=> UserType::admin,
            'gender'=> 'male'
        ];
        User::create($credentials);

        $credentials = [
            'name' => 'user',
            'email' => 'user@ibraintechs.com',
            'phone' => '1234567389',
            'password' => bcrypt('password'),
            'image'=>'http://lorempixel.com/640/480/',
            'type'=> UserType::user,
            'gender'=> 'male'
        ];
        User::create($credentials);
        //factory(App\User::class,40)->create();
    }
}
