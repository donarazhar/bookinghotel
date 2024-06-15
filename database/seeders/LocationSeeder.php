<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Generate cities in Southeast Asia
        City::factory()->count(20)->state('southeast_asia')->create();

        // Generate countries in Southeast Asia
        Country::factory()->count(5)->state('southeast_asia')->create();
    }
}
