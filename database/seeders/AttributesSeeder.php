<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = Attribute::create([
            'name' => 'Size',
            'code' => 'size',
            'frontend_type' => 'radio',
            'is_filterable' => 1,
        ]);
        $size->values()->createMany([
            ...array_map(fn ($item) => ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => $item], range(38, 45)),
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'S'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'M'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'L'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'XL'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'XXL'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'XXXL'],
        ]);

        $color = Attribute::create([
            'name' => 'Color',
            'code' => 'color',
            'frontend_type' => 'radio',
            'is_filterable' => 1,
        ]);
        $color->values()->createMany([
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'gray'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'green'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'white'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'black'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'blue'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'navy'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'creamy white'],
        ]);

        $material = Attribute::create([
            'name' => 'Material',
            'code' => 'material',
            'frontend_type' => 'radio',
        ]);
        $material->values()->createMany([
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'wood'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'cotton'],
            ['code' => strtoupper(bin2hex(random_bytes(4))), 'name' => 'paper'],
        ]);
    }
}
