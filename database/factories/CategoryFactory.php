<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->unique()->randomElement([
        'Earrings',
        'Bracelet',
        'Necklace',
        'Settings',
        'Wedding',
        'Kids'
    ]);



    return [
        'name' => $name,
    ];
});
