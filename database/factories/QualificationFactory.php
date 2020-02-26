<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Qualification;
use Faker\Generator as Faker;

$factory->define(Qualification::class, function (Faker $faker) {
    return [
       'name' => $faker->company
    ];
});
