<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'              => 'admin123',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('bioxperu'),
            'remember_token'    => str_random(10),
            'type_user_id'      => 1
        ]);

        $id_user = DB::table('users')->insertGetId([
            'name'              => 'eren123',
            'email'             => 'eren123@gmail.com',
            'password'          => bcrypt('123456'),
            'remember_token'    => str_random(10),
            'type_user_id'      => 2
        ]);

        DB::table('partners')->insert([
            'nombresSocio'          => 'Eren',
            'apellidoPaternoSocio'  => 'Perez',
            'apellidoMaternoSocio'  => 'Quispe',
            'fechaNacimientoSocio'  => '2001/12/12',
            'direccionSocio'        => 'av mentiras',
            'dniSocio'              => '23123123',
            'sexoSocio'             => 'masculino',
            'telefonoSocio'         => '12345',
            'paisSocio'             => 'Peru',
            'departamentoSocio'     => 'Arequipa',
            'provinciaSocio'        => 'Arequipa',
            'distritoSocio'         => 'Hunter',
            'slugSocio'             => 'asdas212',
            'users_id'              => $id_user
        ]);

        factory(biox2020\User::class, 10)->create();
    }
}