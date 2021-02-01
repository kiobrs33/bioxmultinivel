<?php

use Faker\Generator as Faker;

$factory->define(biox2020\Categorie::class, function (Faker $faker) {
    return [
        'nombreCategoria'    => $faker->word,
        'slugCategoria'      => str_random(10)
    ];
});