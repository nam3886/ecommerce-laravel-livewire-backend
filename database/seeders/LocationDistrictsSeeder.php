<?php

namespace Database\Seeders;

use App\Models\Location\District;
use Illuminate\Database\Seeder;

class LocationDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path       =   __DIR__ . '/json/location_districts.json';
        $districts  = json_decode(file_get_contents($path), true);

        District::insert($districts);
    }
}
