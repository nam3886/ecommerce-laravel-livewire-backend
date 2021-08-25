<?php

namespace Database\Seeders;

use App\Models\Location\Province;
use Illuminate\Database\Seeder;

class LocationProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path       =   __DIR__ . '/json/location_provinces.json';
        $provinces  = json_decode(file_get_contents($path), true);

        Province::insert($provinces);
    }
}
