<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'courseName'=>$faker->sentence,
        'instructorID'=>factory(App\Instructor::class),
        'branchID'=>factory(App\Branch::class),
        'semesterID'=>factory(App\Semester::class),
        'universityYear'=>$faker->year
    ];
});
