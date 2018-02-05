<?php

use Faker\Generator as Faker;

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

$factory->define(\SON\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret', // secret
        'remember_token' => str_random(10),
        'enrolment' => str_random(6)
    ];
});

$factory->define(\SON\Models\UserProfile::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'cep' => function() use($faker){
            $cep = preg_replace('/[^0-9]/','',$faker->postcode());
            return $cep;
        },
        'number' => rand(1,100),
        'complement' => '48',
        'city' => $faker->city,
        'neighborhood' => $faker->city,
        'state' => collect(\SON\Models\State::$states)->random(),
    ];
});
