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
            $description = '<div class="wc-tab-inner"> <div class="">   <div data-elementor-type="product-post" data-elementor-id="90831" class="elementor elementor-90831" data-elementor-settings="[]"> <div class="elementor-inner"> <div class="elementor-section-wrap"> <section class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-ae4b4df elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled" data-id="ae4b4df" data-element_type="section"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-row"> <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-09c6ee8" data-id="09c6ee8" data-element_type="column"> <div class="elementor-column-wrap elementor-element-populated"> <div class="elementor-widget-wrap"> <div class="elementor-element elementor-element-862a644 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor" data-id="862a644" data-element_type="widget" data-widget_type="text-editor.default"> <div class="elementor-widget-container"> <div class="elementor-text-editor elementor-clearfix"><p>Fullbox '.$product['name'].' CDG c??? cao, th???p 2 m??u ??en, tr???ng. Ph?? h???p: nam n???, ??i h???c, ??i l??m, ho???t ?????ng th??? thao. Size: 36-44. Ch???t li???u: Canvas. Giao h??ng to??n qu???c. B???o h??nh 3 th??ng. ?????i tr??? d??? d??ng. Streetwear, tr??? trung n??ng ?????ng.</p></div> </div> </div> <div class="elementor-element elementor-element-c10484c color-scheme-inherit text-left elementor-widget elementor-widget-text-editor" data-id="c10484c" data-element_type="widget" data-widget_type="text-editor.default"> <div class="elementor-widget-container"> <div class="elementor-text-editor elementor-clearfix"><p>COMME des GAR??ONS v?? '.$product['name'].' th???t s??? ???? mang ?????n m???t l??n gi?? m???i cho nh???ng ai y??u th??ch s??? gi???n ????n nh??ng v???n th??? hi???n ???????c phong c??ch ri??ng v?? s??? s??ng t???o trong ????.</p><p>????i gi??y CDG Play x '.$product['name'].' ???????c ra m???t l???n ?????u v??o n??m 2013. S??? k???t h???p n??y kh??ng ch??? mang ?????n m???t h??nh ???nh m???i m??? cho '.$product['name'].' c??ng nh?? CDG Play m?? c??n t???o ???????c d???u ???n kh?? r?? n??t trong l??ng nh???ng ai ??am m?? sneakers.</p><p>????n gi???n m?? hi???u qu???, n???m b???t ???????c t??m l?? n??y c???a gi???i ??am m?? th???i trang v?? sneakers to??n th??? gi???i, COMME des GAR??ONS Play v?? '.$product['name'].' th???t s??? ???? mang ?????n m???t l??n gi?? m???i cho nh???ng ai y??u th??ch s??? gi???n ????n nh??ng v???n th??? hi???n ???????c phong c??ch ri??ng v?? s??? s??ng t???o trong ????.</p><p>D??? d??ng k???t h???p v???i c??c lo???i trang ph???c v?? phong c??ch kh??c nhau, CDG Play X '.$product['name'].' th???t s??? r???t ????ng ????? ch??ng ta s??? h???u v?? l??m m???i h??nh ???nh thay v?? nh???ng m???u '.$product['name'].' th??ng th?????ng ????ng kh??ng n??o?</p></div> </div> </div> </div> </div> </div> </div> </div> </section> <section class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-9026a73 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled" data-id="9026a73" data-element_type="section"> <div class="elementor-container elementor-column-gap-default"> <div class="elementor-row"> <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-17d4c3b" data-id="17d4c3b" data-element_type="column"> <div class="elementor-column-wrap elementor-element-populated"> <div class="elementor-widget-wrap"> <div class="elementor-element elementor-element-71b4c9d elementor-widget elementor-widget-image" data-id="71b4c9d" data-element_type="widget" data-widget_type="image.default"> <div class="elementor-widget-container"> <div class="elementor-image"> <div class="placeholder-image loading"><img class="lazyload" data-sizes="auto" data-srcset="'.$lastImage.'"data-src="'.$lastImage.'" /></div> </div> </div> </div> </div> </div> </div> </div></div> </section> </div> </div> </div> </div> </div> ';

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
