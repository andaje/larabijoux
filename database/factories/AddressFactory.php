<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'city_id'=> $faker ->numberBetween($min =1, $max = 1000),
        'street' => $faker ->streetName,
    ];
});
