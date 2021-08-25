<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'      =>  'Nguyễn Phương Nam',
            'email'     =>  'nphuongnam8@gmail.com',
            'password'  =>  '123456',
            'phone'     =>  '0973366072',
            'birthday'  =>  now(),
        ]);
    }
}
