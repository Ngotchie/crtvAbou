<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
             UserSeeder::class,
             RegionSeeder::class,
             VilleSeeder::class,
             TypesImmoSeeder::class,
             DetenteurSeeder::class,
             NnsSeeder::class,
             SitesSeeder::class
        ]);
    }
}
