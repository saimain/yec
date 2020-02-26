<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\UserDetail;
use Faker\Generator as Faker;

$factory->define(UserDetail::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return App\Model\User\User::all()->random();
        },
        'phone'=> $faker->e164PhoneNumber,
        'dob'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'address' => $faker->streetAddress,
        'education' => $faker->text($maxNbChars = 200),
        'company' => $faker->company,
        'role' => $faker->jobTitle
    ];
});
