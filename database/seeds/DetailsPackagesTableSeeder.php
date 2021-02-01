<?php

use Illuminate\Database\Seeder;

class DetailsPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(biox2020\DetailsPackage::class, 10)->create();
    }
}