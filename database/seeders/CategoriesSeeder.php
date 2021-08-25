<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = 'Enim sunt et asperiores numquam voluptate amet deserunt. A dolore atque repellat qui veniam aspernatur voluptas inventore. Ad optio dolor debitis et et. Ipsum quis ut hic omnis reiciendis quas et. Aut non maiores voluptatem. Deleniti quia quae illo voluptas. Fugiat voluptas ea illum ullam. Deleniti enim nulla magni sed repellat. Officia et dolor explicabo. Molestiae et sed totam aperiam pariatur enim. Ipsum qui ea sunt vitae. Consequuntur animi ea tempore dignissimos.';

        $categories = [
            [
                'name'              =>  'shoes',
                'slug'              =>  Str::slug('shoes') . '-' . uniqid(),
                'seo_image'         =>  [
                    'link'          =>  [
                        '480w'      =>  'https://drive.google.com/uc?id=1gfCE0R5Yj_JXxRxR1IVMvj2WnL8m_gtM&export=media'
                    ],
                    'path'          =>  [
                        '480w'      => '1znI-7ibCvvOe45pkMKqu28afhsOS-eM-/1gfCE0R5Yj_JXxRxR1IVMvj2WnL8m_gtM'
                    ],
                ],
                'seo_title'         =>  'shoes',
                'seo_description'   =>  $text,
                'seo_keyword'       =>  'shoes',
            ],
            [
                'name'              =>  "women's shoes",
                'slug'              =>  Str::slug("women's shoes") . '-' . uniqid(),
                'seo_image'         =>  [
                    'link'          =>  [
                        '480w'      =>  'https://drive.google.com/uc?id=1xH56b6_AQq_kFNpfd-yhUrzT8PdNjbnP&export=media'
                    ],
                    'path'          =>  [
                        '480w'      => '1znI-7ibCvvOe45pkMKqu28afhsOS-eM-/1xH56b6_AQq_kFNpfd-yhUrzT8PdNjbnP'
                    ],
                ],
                'parent_id'         =>  1,
                'seo_title'         =>  "women's shoes",
                'seo_description'   =>  $text,
                'seo_keyword'       =>  "women's shoes",
            ],
            [
                'name'              =>  "men's shoes",
                'slug'              =>  Str::slug("men's shoes") . '-' . uniqid(),
                'seo_image'         =>  [
                    'link'          =>  [
                        '480w'      =>  'https://drive.google.com/uc?id=11Wgy77dPA4lrXHB582en5aZGrmAm2XiC&export=media'
                    ],
                    'path'          =>  [
                        '480w'      => '1znI-7ibCvvOe45pkMKqu28afhsOS-eM-/11Wgy77dPA4lrXHB582en5aZGrmAm2XiC'
                    ],
                ],
                'parent_id'         =>  1,
                'seo_title'         =>  "men's shoes",
                'seo_description'   =>  $text,
                'seo_keyword'       =>  "men's shoes",
            ],
            [
                'name'              =>  't-shirt',
                'slug'              =>  Str::slug('t-shirt') . '-' . uniqid(),
                'seo_image'         =>  [
                    'link'          =>  [
                        '480w'      =>  'https://drive.google.com/uc?id=1Y2gjiwp9HVozh93nUIKByP-jWZOhtGm3&export=media'
                    ],
                    'path'          =>  [
                        '480w'      =>  '1znI-7ibCvvOe45pkMKqu28afhsOS-eM-/1Y2gjiwp9HVozh93nUIKByP-jWZOhtGm3'
                    ],
                ],
                'seo_title'         =>  't-shirt',
                'seo_description'   =>  $text,
                'seo_keyword'       =>  't-shirt',
            ],
            [
                'name'              =>  'electronics',
                'slug'              =>  Str::slug('electronics') . '-' . uniqid(),
                'seo_image'         =>  [
                    'link'          =>  [
                        '480w'      =>  'https://drive.google.com/uc?id=1NptZDwc-pPtRjl6VQnBr3gmHUZMmplo1&export=media'
                    ],
                    'path'          =>  [
                        '480w'      =>  '1znI-7ibCvvOe45pkMKqu28afhsOS-eM-/1NptZDwc-pPtRjl6VQnBr3gmHUZMmplo1'
                    ],
                ],
                'seo_title'         =>  'electronics',
                'seo_description'   =>  $text,
                'seo_keyword'       =>  'electronics',
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
