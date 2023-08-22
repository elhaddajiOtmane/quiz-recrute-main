<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date,
        'desired_position' => $faker->jobTitle,
        'CV' => $faker->word, // You can adjust this to generate file paths or URLs for CVs
        'cover_letter' => $faker->paragraph,
        'comments' => $faker->sentence,
        'application_date' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'), // You can change 'password' to a desired default password
        'mobile' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'role' => $faker->randomElement(['A', 'B', 'S']), // Assuming 'role' is one of these values
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
