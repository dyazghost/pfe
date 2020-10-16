<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instructor;
use Faker\Generator as Faker;

$factory->define(Instructor::class, function (Faker $faker) {
    return [
        'instructorID'=>$faker->id,
        'fullName'=>$faker->name,
        'courseID'=> factory(App\Course::class)
        ];
});
