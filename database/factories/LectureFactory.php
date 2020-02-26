<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Lecture;
use Faker\Generator as Faker;

$factory->define(Lecture::class, function (Faker $faker) {
    return [
        'name' => $faker->titleMale,
        'email'=> $faker->email,
        'phone'=> $faker->e164PhoneNumber,
        'dob'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'address' => $faker->streetAddress,
        'bio' => $faker->text($maxNbChars = 200),
        'qualification_id' => function () {
            return App\Model\Qualification::all()->random();
        }
    ];
});
