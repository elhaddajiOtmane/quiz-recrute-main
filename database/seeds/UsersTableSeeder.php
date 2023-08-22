<?php

// import model
use App\User;


use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\User::factory(10)->create();
    }
}




