<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path       =   __DIR__ . '/json/';
        $products   =   json_decode(file_get_contents($path . 'products.json'), true);
        $images     =   json_decode(file_get_contents($path . 'images.json'), true);

        // sort products and images by product_id
        usort($products,  fn ($a, $b) => $a['id'] <=> $b['id']);
        usort($images, fn ($a, $b) => $a['product_id'] <=> $b['product_id']);

        foreach ($products as $key => $product) {
            $dt         =   Carbon::now();
            $newProduct =   new Product();
            $price = rand(500, 1000);
            $quantity = rand(30, 50);
            $discount = rand(10, 50);
            $start = now();
            $end = $dt->addDays(rand(1, 30));
            $count = 0;
            $isMultipleVariant = rand(0, 1);
            $hasMaterial = rand(0, 1);
            $lastImage = collect($product['seo_image']['link'])->last();
            $description = '<div class="wc-tab-inner"> <div class="">   <div data-elementor-type="product-post" data-elementor-id="90831" class="elementor elementor-90831" data-elementor-settings="[]"> <div class="elementor-inner"> <div class="elementor-section-wrap"> <section class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-ae4b4df elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled" data-id="ae4b4df" data-element_type="section"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-row"> <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-09c6ee8" data-id="09c6ee8" data-element_type="column"> <div class="elementor-column-wrap elementor-element-populated"> <div class="elementor-widget-wrap"> <div class="elementor-element elementor-element-862a644 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor" data-id="862a644" data-element_type="widget" data-widget_type="text-editor.default"> <div class="elementor-widget-container"> <div class="elementor-text-editor elementor-clearfix"><p>Fullbox '.$product['name'].' CDG cổ cao, thấp 2 màu đen, trắng. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Chất liệu: Canvas. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng. Streetwear, trẻ trung năng động.</p></div> </div> </div> <div class="elementor-element elementor-element-c10484c color-scheme-inherit text-left elementor-widget elementor-widget-text-editor" data-id="c10484c" data-element_type="widget" data-widget_type="text-editor.default"> <div class="elementor-widget-container"> <div class="elementor-text-editor elementor-clearfix"><p>COMME des GARÇONS và '.$product['name'].' thật sự đã mang đến một làn gió mới cho những ai yêu thích sự giản đơn nhưng vẫn thể hiện được phong cách riêng và sự sáng tạo trong đó.</p><p>Đôi giày CDG Play x '.$product['name'].' được ra mắt lần đầu vào năm 2013. Sự kết hợp này không chỉ mang đến một hình ảnh mới mẻ cho '.$product['name'].' cũng như CDG Play mà còn tạo được dấu ấn khá rõ nét trong lòng những ai đam mê sneakers.</p><p>Đơn giản mà hiệu quả, nắm bắt được tâm lý này của giới đam mê thời trang và sneakers toàn thế giới, COMME des GARÇONS Play và '.$product['name'].' thật sự đã mang đến một làn gió mới cho những ai yêu thích sự giản đơn nhưng vẫn thể hiện được phong cách riêng và sự sáng tạo trong đó.</p><p>Dễ dàng kết hợp với các loại trang phục và phong cách khác nhau, CDG Play X '.$product['name'].' thật sự rất đáng để chúng ta sở hữu và làm mới hình ảnh thay vì những mẫu '.$product['name'].' thông thường đúng không nào?</p></div> </div> </div> </div> </div> </div> </div> </div> </section> <section class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-9026a73 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled" data-id="9026a73" data-element_type="section"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-row"> <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-17d4c3b" data-id="17d4c3b" data-element_type="column"> <div class="elementor-column-wrap elementor-element-populated"> <div class="elementor-widget-wrap"> <div class="elementor-element elementor-element-71b4c9d elementor-widget elementor-widget-image" data-id="71b4c9d" data-element_type="widget" data-widget_type="image.default"> <div class="elementor-widget-container"> <div class="elementor-image"> <div class="placeholder-image loading"><img class="lazyload" data-sizes="auto" data-srcset="'.$lastImage.'"data-src="'.$lastImage.'" /></div> </div> </div> </div> </div> </div> </div> </div></div> </section> </div> </div> </div> </div> </div> ';

            $newProduct->fill([
                'brand_id'          =>  $product['brand_id'],
                'slug'              =>  Str::slug($product['name']) . '-' . uniqid(),
                'name'              =>  $product['name'],
                'content'           =>  $product['content'],
                // 'description'       =>  $product['description'],
                'description'       =>  $description,
                'price'             =>  $isMultipleVariant ? $price + 30 : $price,
                'quantity'          =>  $isMultipleVariant ? 29 * $quantity - 29 * (29 + 1) / 2 : $quantity,
                'flag'              =>  $product['flag'],
                'seo_image'         =>  $product['seo_image'],
                'seo_title'         =>  $product['seo_title'],
                'seo_description'   =>  $product['seo_description'],
                'seo_keyword'       =>  $product['seo_keyword'],
            ]);

            $newProduct->save();

            $newProduct->gallery()->create([
                'images'        =>  $images[$key]['images'],
                'avatar'        =>  $images[$key]['avatar'],
            ]);

            $categories = [1, rand(2, 3)];
            $newProduct->categories()->attach($categories);
            $newProduct->tags()->attach($categories);

            if ($newProduct->flag !== 'hot') {
                $newProduct->discount()->create([
                    'value'         =>  $discount,
                    'start'         =>  $start,
                    'end'           =>  $end,
                ]);
            }

            for ($i = 0; $i < 30; $i++) {

                do {
                    $count++;
                    $size = AttributeValue::find(rand(1, 8));
                    $color = AttributeValue::find(rand(15, 21));

                    if ($hasMaterial) {
                        $material = AttributeValue::find(rand(22, 24));
                        $combination = [$size->code,  $color->code, $material->code];
                        sort($combination);
                        $combination = strtoupper($newProduct->id . implode($combination) . ':3');
                    } else {
                        $combination = [$size->code,  $color->code];
                        sort($combination);
                        $combination = strtoupper($newProduct->id . implode($combination) . ':2');
                    }
                    // product id + ...(attribute code + attribute value id) => sort
                    //  => + count attribute
                    $dupVariant = $newProduct->variants()->whereCombination($combination)->first();
                } while ($dupVariant);

                if ($hasMaterial) {

                    $productSku = strtoupper(substr($newProduct->name, 0, 3) . $newProduct->id  . 'siz' . $size->name . 'col' . Str::camel($color->name) . 'mat' . Str::camel($material->name) . '/US');
                    $variant = $newProduct->variants()->create([
                        'name' => "size:{$size->name}-color:{$color->name}-material:{$material->name}",
                        'sku' => $productSku,
                        'combination' => $combination,
                        'price' => $price + $i,
                        'quantity' => $quantity - $i,
                    ]);
                    $variant->attributeValues()->attach([$size->id, $color->id, $material->id]);
                } else {

                    $productSku = strtoupper(substr($newProduct->name, 0, 3) . $newProduct->id  . 'siz' . $size->name . 'col' . Str::camel($color->name) . '/US');
                    $variant = $newProduct->variants()->create([
                        'name' => "size:{$size->name}-color:{$color->name}",
                        'sku' => $productSku,
                        'combination' => $combination,
                        'price' => $price + $i,
                        'quantity' => $quantity - $i,
                    ]);
                    $variant->attributeValues()->attach([$size->id, $color->id]);
                }

                if ($newProduct->flag !== 'hot') {
                    $variant->discount()->create([
                        'value'         =>   $i === 2 ? $discount - 8 : $discount,
                        'start'         =>  $start,
                        'end'           =>  $end,
                    ]);
                }

                $count = 0;

                if (!$isMultipleVariant) {
                    break;
                }
            }
        }
    }
}
