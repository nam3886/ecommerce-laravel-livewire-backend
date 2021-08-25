<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path       =   __DIR__ . '/json/banners.json';
        $banners  = json_decode(file_get_contents($path), true);

        foreach ($banners as  $banner) {
            unset($banner['id']);
            Banner::create($banner);
        }
    }
}
