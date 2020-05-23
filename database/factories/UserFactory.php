<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\MeetUp;
use App\State;
use App\FriendRequest;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(MeetUp::class, function(Faker $faker){
	return [
		'user_id'=>random_int(1, 24),
		'age'=>random_int(15, 30),
		'religion'=>$faker->randomElement(['islam','christian']),
		'state'=> random_int(1, 36),
		'tribe'=>$faker->randomElement(['hausa','igbo','yoruba']),
		'occupation'=> $faker->jobTitle,
		'description'=>$faker->sentence

	];
});

$factory->define(FriendRequest::class, function(Faker $faker){
	return [
		'meet_up_id'=>random_int(11, 24),
		'to'=>random_int(1, 10)

	];
});


$factory->define(State::class, function(Faker $faker){
	return [
		'name'=>Str::random(5),

	];
});

