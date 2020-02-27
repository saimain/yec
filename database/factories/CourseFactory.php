<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
         'name' => $faker->firstNameMale,
        'lecture_id'=> function () {
            return App\Model\Lecture::all()->random();
        },
        'description'=> $faker->text($maxNbChars = 200),
        'start'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'end' =>  $faker->date($format = 'Y-m-d', $max = 'now'),
        'duration' => $faker->text($maxNbChars = 30),
        'timetable' => $faker->text($maxNbChars = 30),
        'fees' => $faker->text($maxNbChars = 30),
        'exam' => $faker->text($maxNbChars = 30),
        'examregfees' => $faker->text($maxNbChars = 30),
        'examfees' => $faker->text($maxNbChars = 30),
        'note' => $faker->text($maxNbChars = 50),
        'cover' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
