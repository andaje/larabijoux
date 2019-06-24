<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

        $product = $faker->unique()->sentence;

    return [
        'photo_id'=> $faker->numberBetween(1,10),
        'category_id'=> $faker->randomElement(App\Category::pluck('id')),
        'name' => $product,
        'title' => 'Product',
        'description' => $this->faker->paragraph,
        'quantity' => 11,
        'price' => 10.00


    ];
});
