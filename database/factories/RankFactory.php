<?php

use Faker\Generator as Faker;

$factory->define(biox2020\Rank::class, function (Faker $faker) {
    return [
        'nombreRango'               => $faker->word,
        'descripcionRango'          => $faker->text(100),
        'puntajePersonalRango'      => rand(1,10),
        'puntajeGrupalRango'        => rand(1,20),
        'puntajeDirectosRango'      => rand(1,40),
        'activosFranquiciadosRango' => rand(1,50),
        'slugRango'                 => str_random(10)
    ];
});