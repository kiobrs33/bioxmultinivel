<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeUserTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(RanksTableSeeder::class);
        $this->call(WarehousesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(DetailsPackagesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
    }
}