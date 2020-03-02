<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Player::class, function (Faker $faker) {
    return [
        "email" => $faker->unique()->safeEmail,
        "password" => Hash::make(123456),
        "full_name" => $faker->name,
        "image" => "",
        "dob" => $faker->date(),
        "phone_number" => $faker->phoneNumber,
        "emergency_name" => $faker->name,
        "emergency_phone" => $faker->phoneNumber,
        "gender" => random_int(1, 2),
        "height" => $faker->numberBetween(1, 999),
        "nationality" => "Armenian",
        "jersey_number" => $faker->numberBetween(1, 999),
        "jersey_size" => $faker->numberBetween(1, 999),
        "position" => 'SF',
        "notes" => $faker->text,
    ];
});



