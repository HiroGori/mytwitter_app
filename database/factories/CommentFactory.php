<?php

use Faker\Generator as Faker;
use App\Models as Models;

$factory->define(Models\Comment::class, function (Faker $faker) {
    return [
        'body' => "コメントです。”,
    ];
});
