<?php

use Faker\Generator as Faker;

$factory->define(biox2020\DetailsPackage::class, function (Faker $faker) {
    return [
        'cantidadDetallePaquete'    => rand(1, 20), 
        'products_id'               => rand(1,50),
        'packages_id'               => rand(1,10)
    ];
});