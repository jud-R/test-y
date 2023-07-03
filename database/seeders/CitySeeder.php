<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = ['Paris', 'Lille', 'Marseille', 'Nantes'];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
