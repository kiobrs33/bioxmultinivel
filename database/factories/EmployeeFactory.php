<?php

use Faker\Generator as Faker;

$factory->define(biox2020\Employee::class, function (Faker $faker) {
    return [
        'nombresTrabajador'         => $faker->name,
        'apellidoPaternoTrabajador' => $faker->word,
        'apellidoMaternoTrabajador' => $faker->word,
        'telefonoTrabajador'        => $faker->e164PhoneNumber,
        'direccionTrabajador'       => $faker->address,
        'dniTrabajador'             => rand(1000000,9999999),
        'sexoTrabajador'            => $faker->randomElement(['masculino','femenino']),
        'slugTrabajador'            => str_random(10),
        'users_id'                  => rand(3,10)
    ];
});