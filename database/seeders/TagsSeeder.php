<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name'              =>  'shoes',
                'slug'              =>  Str::slug('shoes') . '-' . uniqid(),
            ],
            [
                'name'              =>  "women's shoes",
                'slug'              =>  Str::slug("women's shoes") . '-' . uniqid(),
            ],
            [
                'name'              =>  "men's shoes",
                'slug'              =>  Str::slug("men's shoes") . '-' . uniqid(),
            ],
            [
                'name'              =>  't-shirt',
                'slug'              =>  Str::slug('t-shirt') . '-' . uniqid(),
            ],
            [
                'name'              =>  'electronics',
                'slug'              =>  Str::slug('electronics') . '-' . uniqid(),
            ]
        ];

        Tag::insert($tags);
    }
}
