<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Municipality;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

          $this->call(ProvinceSeeder::class);
        Municipality::factory(10)->create();
        User::factory(100)->create();

        //  $this->call(MunicipalityTransactionSeeder::class);
         $this->call(equipmentSeeder::class);

      
    }
}
