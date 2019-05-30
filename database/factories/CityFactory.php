<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        //

        'country_id'=> $faker->numberBetween($min =1, $max = 10),
        'name'=> $faker->city,
        'postal_code' => $faker->postcode,
    ];
});
