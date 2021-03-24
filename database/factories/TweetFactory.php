<?php

use Faker\Generator as Faker;
use App\Models as Models;

$factory->define(Models\Tweet::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'body' => "つぶやきます。",
    ];
});
