<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    //On recupere un commercant au hasard
    $seller = App\Seller::all()->random(1)->first();
    $category = App\Category::all()->random(1)->first();
    return [
        'name'          => $faker->words(2,true),
        'description'   => $faker->paragraphs(3),
        'price'         => $faker->numberBetween(100, 9999999),
        'seller_id'     => $seller->id,
        'category_id'   => $category->id
    ];
});
