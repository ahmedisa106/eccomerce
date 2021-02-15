<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Admin::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(30))

    ];
});
