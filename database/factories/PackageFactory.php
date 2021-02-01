<?php

use Faker\Generator as Faker;

$factory->define(biox2020\Package::class, function (Faker $faker) {
    return [     
        'nombrePaquete'         => $faker->word,
        'puntosPaquete'         => rand(1,100),
        'fechaRegistroPaquete'  => $faker->date($format = 'Y-m-d', $max = 'now'),
        'bonoPaquete'           => rand(50,200),
        'slugPaquete'           => str_random(10)
    ];
});