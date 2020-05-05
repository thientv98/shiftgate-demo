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
        $this->call(AdminTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        //$this->call(CustomerTableSeeder::class);
        $this->call(MakersTableSeeder::class);
        $this->call(ModelsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        //$this->call(CarTableSeeder::class);
        
        $this->call(LandTransportationFeesTableSeeder::class);
    }
}
