<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer               =   Role::create([
            'name'              =>  'Customer',
            'slug'              =>  'customer',
            'permissions'       =>  [
                'read'     =>  true,
            ]
        ]);

        $admin                  = Role::create([
            'name'              =>  'Administrator',
            'slug'              =>  'admin',
            'permissions'       =>  [
                'root'          =>  true,
            ]
        ]);
    }
}
