<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'home',
                'slug' => 'home',
            ],
            [
                'name' => 'shop',
                'slug' => 'shop',
            ],
            [
                'category_id' => 1,
            ],
            [
                'category_id' => 2,
                'parent_id' => 3,
            ],
            [
                'category_id' => 3,
                'parent_id' => 3,
            ],
            [
                'name' => 'cate5.1',
                'slug' => 'cate5.1',
                'parent_id' => 5,
            ],
            [
                'name' => 'cate5.2',
                'slug' => 'cate5.2',
                'parent_id' => 5,
            ],
            [
                'name' => 'cate4.1',
                'slug' => 'cate4.1',
                'parent_id' => 4,
            ],
            [
                'name' => 'cate4.1.1',
                'slug' => 'cate4.1.1',
                'parent_id' => 8,
            ],
            [
                'name' => 'sneaker4',
                'slug' => 'sneaker4',
                'parent_id' => 3,
            ],
            [
                'name' => 'about us',
                'slug' => 'about-us',
            ],
            [
                'name' => 'contact us',
                'slug' => 'contact-us',
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
