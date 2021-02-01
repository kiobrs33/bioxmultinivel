<?php

use Faker\Generator as Faker;

$factory->define(biox2020\Warehouse::class, function (Faker $faker) {
    return [
        'nombreAlmacen'     => $faker->word,
        'direccionAlmacen'  => $faker->address,
        'tipoAlmacen'       => $faker->randomElement(['insumos','productos']),
        'slugAlmacen'       => str_random(10)
    ];
});