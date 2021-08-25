<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $text = 'Enim sunt et asperiores numquam voluptate amet deserunt. A dolore atque repellat qui veniam aspernatur voluptas inventore. Ad optio dolor debitis et et. Ipsum quis ut hic omnis reiciendis quas et. Aut non maiores voluptatem. Deleniti quia quae illo voluptas. Fugiat voluptas ea illum ullam. Deleniti enim nulla magni sed repellat. Officia et dolor explicabo. Molestiae et sed totam aperiam pariatur enim. Ipsum qui ea sunt vitae. Consequuntur animi ea tempore dignissimos.';

        $brands = [
            [
                'name'          =>  'Adidas',
                'slug'          =>  Str::slug('Adidas') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w"  =>  "https://drive.google.com/uc?id=1tofXuKPLsmbB7dkNSmo3dk3N4MCTeZnH&export=media"
                    ],
                    'path'      =>  [
                        "480w"  =>  "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1tofXuKPLsmbB7dkNSmo3dk3N4MCTeZnH"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'Nike',
                'slug'          =>  Str::slug('Nike') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w"  =>  "https://drive.google.com/uc?id=1hMF7bNQJ7j51QTX4Cp_T-Unw481sID27&export=media"
                    ],
                    'path'      =>  [
                        "480w"  =>  "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1hMF7bNQJ7j51QTX4Cp_T-Unw481sID27"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'Alexander Mcqueen',
                'slug'          =>  Str::slug('Alexander Mcqueen') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w" => "https://drive.google.com/uc?id=1X83jNbbWGYvGIwXjTptRp92T0sqIpKoo&export=media"
                    ],
                    'path'      =>  [
                        "480w" => "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1X83jNbbWGYvGIwXjTptRp92T0sqIpKoo"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'Balenciaga ',
                'slug'          =>  Str::slug('Balenciaga ') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w" => "https://drive.google.com/uc?id=1s2HjYISuSG4QUPBhVBRapFVBsztgolc8&export=media"
                    ],
                    'path'      =>  [
                        "480w" => "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1s2HjYISuSG4QUPBhVBRapFVBsztgolc8"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'New Balance',
                'slug'          =>  Str::slug('New Balance') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w" => "https://drive.google.com/uc?id=1AlfSwv5P6zyejwjPXGWm36TJpbT5pCCI&export=media"
                    ],
                    'path'      =>  [
                        "480w" => "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1AlfSwv5P6zyejwjPXGWm36TJpbT5pCCI"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'Converse',
                'slug'          =>  Str::slug('Converse') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w" => "https://drive.google.com/uc?id=1xjQ0mtOaL-O-XyolnwCVrysCKx9gC8XI&export=media"
                    ],
                    'path'      =>  [
                        "480w" => "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1xjQ0mtOaL-O-XyolnwCVrysCKx9gC8XI"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'Vans',
                'slug'          =>  Str::slug('Vans') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w" => "https://drive.google.com/uc?id=1e0o9ZJG7jue-IiLIgRCz-P_wp76adOTQ&export=media"
                    ],
                    'path'      =>  [
                        "480w" => "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1e0o9ZJG7jue-IiLIgRCz-P_wp76adOTQ"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'Puma',
                'slug'          =>  Str::slug('Puma') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w" => "https://drive.google.com/uc?id=1Dmmcwm9V0eS7tjfWwP6VfJYjENNenj_w&export=media"
                    ],
                    'path'      =>  [
                        "480w" => "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1Dmmcwm9V0eS7tjfWwP6VfJYjENNenj_w"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'MLB',
                'slug'          =>  Str::slug('MLB') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w" => "https://drive.google.com/uc?id=1JIrOow_tYVppxclaqX99Puob4Zfas9C2&export=media"
                    ],
                    'path'      =>  [
                        "480w" => "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1JIrOow_tYVppxclaqX99Puob4Zfas9C2"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ],
            [
                'name'          =>  'Other',
                'slug'          =>  Str::slug('Other') . '-' . uniqid(),
                'image'         =>  [
                    'link'      =>  [
                        "480w" => "https://drive.google.com/uc?id=1Le9I97iAmuztvI3OI03r8a12m6rtyJie&export=media"
                    ],
                    'path'      =>  [
                        "480w" => "1OFA7QsFRc6SSLku5G6sDP_TF55H_z-E4/1Le9I97iAmuztvI3OI03r8a12m6rtyJie"
                    ],
                ],
                'description'   =>  $text,
                'content'       =>  $text
            ]
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
