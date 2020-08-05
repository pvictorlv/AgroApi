<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Praga;
use Faker\Generator as Faker;

$factory->define(Praga::class, function (Faker $faker) {
    return [
        'nome' => $faker->name
    ];
});
