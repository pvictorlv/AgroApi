<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cultura;
use Faker\Generator as Faker;

$factory->define(Cultura::class, function (Faker $faker) {
    return [
        'nome' => $faker->name
    ];
});
