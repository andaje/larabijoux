<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'city_id'=> $faker ->randomElement(App\City::pluck('id')),
        'street' => $faker ->streetName,
        'house_nr' => '1b',
        'bus' => '2a',
    ];
});
