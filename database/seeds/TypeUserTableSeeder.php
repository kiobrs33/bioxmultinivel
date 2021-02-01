<?php

use Illuminate\Database\Seeder;

class TypeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_user')->insert(
            ['tipo_usuario' => 'admin']
        );

        DB::table('type_user')->insert(
            ['tipo_usuario' => 'partner']
        );

        DB::table('type_user')->insert(
            ['tipo_usuario' => 'employee']
        );
    }
}