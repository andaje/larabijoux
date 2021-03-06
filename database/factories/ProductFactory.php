<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {



    return [
        //'photo_id'=> $faker->numberBetween(1,5),
        'category_id'=> $faker->randomElement(App\Category::pluck('id')),
        'name' => $faker->unique()->randomElement(['P1','P2','P3','P4','P5']),
        'title' => 'Product',
        'description' => $this->faker->paragraph,
        'quantity' => 11,
        'price' => 10.00,
        'weight' => 00.00

    ];
});
