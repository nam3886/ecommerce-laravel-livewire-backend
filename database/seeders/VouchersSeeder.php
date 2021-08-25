<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VouchersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = 'Enim sunt et asperiores numquam voluptate amet deserunt. A dolore atque repellat qui veniam aspernatur voluptas inventore. Ad optio dolor debitis et et. Ipsum quis ut hic omnis reiciendis quas et. Aut non maiores voluptatem. Deleniti quia quae illo voluptas. Fugiat voluptas ea illum ullam. Deleniti enim nulla magni sed repellat. Officia et dolor explicabo. Molestiae et sed totam aperiam pariatur enim. Ipsum qui ea sunt vitae. Consequuntur animi ea tempore dignissimos.';

        for ($i = 0; $i < 10; $i++) {
            $dt = Carbon::now();
            $discountPercent = rand(10, 50);
            $product = rand(1, 100);

            Voucher::create([
                'value'         =>  $discountPercent,
                'stock'         =>  rand(1, 10),
                'unit'          =>  'percent',
                'products_id'   =>  [$product],
                'code'          =>  strtoupper(md5(uniqid(rand(), true))),
                'description'   =>  $text,
                'start'         =>  now(),
                'end'           =>  $dt->addDays(rand(1, 30)),
            ]);
        }

        Voucher::create([
            'value'         =>  $discountPercent,
            'stock'         =>  rand(1, 10),
            'unit'          =>  'percent',
            'products_id'   =>  ["all"],
            'code'          =>  md5(uniqid(rand(), true)),
            'description'   =>  $text,
            'start'         =>  now(),
            'end'           =>  $dt->addDays(rand(1, 30)),
        ]);
    }
}
