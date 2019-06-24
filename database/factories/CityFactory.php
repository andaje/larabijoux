<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        //

        'country_id'=> $faker->randomElement(App\Country::pluck('id')),
        'name'=> $faker->city,
        'postal_code' => $faker->postcode,
    ];
});
