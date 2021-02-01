<?php

use Faker\Generator as Faker;

$factory->define(biox2020\Provider::class, function (Faker $faker) {
    $nombre = $faker->sentence(15);
    return [
        'razonSocialProveedor'  => $nombre,
        'rucProveedor'          => rand(10000000000,99999999999),
        'direccionProveedor'    => $faker->address,
        'contactoProveedor'     => $faker->name,
        'telefonoProveedor'     => rand(100000000,999999999),
        'slugProveedor'         => str_random(10)
    ];
});