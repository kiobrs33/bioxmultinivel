<?php

use Faker\Generator as Faker;

$factory->define(biox2020\Product::class, function (Faker $faker) {
    return [
        'codigoProducto'        => str_random(5),
        'nombreProducto'        => $faker->word,  
        'descripcionProducto'   => $faker->text(100),
        'puntosProducto'        => rand(1,100),
        'precioProducto'        => rand(1,50),
        'tipoUnidadProducto'    => $faker->randomElement(['unidad','kilogramo','litro']),
        'urlImagenProducto'     => $faker->randomElement([
            'https://i.pinimg.com/originals/e4/f3/40/e4f3408cee71e3a925da85d1968a7e2d.jpg',
            'https://perfumesyfragancias.online/wp-content/uploads/2018/10/poire.jpg',
            'https://ecocosas.com/wp-content/uploads/2012/10/img_cuales_son_los_beneficios_de_las_fresas_7561_orig.jpg']),
        'slugProducto'          => str_random(10),
        'categories_id'         => rand(1,10)
    ];
});