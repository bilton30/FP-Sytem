<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
    
        // $this->call(payment_typesSeeder::class);
        Tenant::checkCurrent()
           ? $this->runTenantSpecificSeeders()
           : $this->runLandlordSpecificSeeders();
    }
    public function runTenantSpecificSeeders()
    {
        // run tenant specific seeders
      
    }

    public function runLandlordSpecificSeeders()
    {
        // run landlord specific seeders
    }
}
