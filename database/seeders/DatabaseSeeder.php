<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\ResponseCache\Facades\ResponseCache;

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
        $this->call(UsersSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(BannersSeeder::class);
        $this->call(AttributesSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(VouchersSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(MenusSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ArticleSeeder::class);
        // only once time
        $this->call(LocationProvincesSeeder::class);
        $this->call(LocationDistrictsSeeder::class);
        // $this->call(LocationWardsSeeder::class);
        cache()->flush();
    }
}
