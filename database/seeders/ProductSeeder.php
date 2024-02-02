<?php

namespace Database\Seeders;

use DB;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Product::factory(1000)->create();
        // DB::table('products')->insert(array (
        //     0 =>
        //     array (
        //         'id' => '00eab4ab-9fbf-4dc2-a098-f3025e02fd09',
        //         'product_code' => 'PR-1',
        //         'name_fr' => 'Mouce',
        //         'name_ar' => 'souris',
        //         'category_id' => 'd54e21bd-e7bf-45df-951a-2cd17c165cfc',
        //         'scategory_id' => 'cb003d55-2f32-46c3-bc1b-9e2306f9060a',
        //         'buy_price' => 300.0,
        //         'price_unit' => 400.0,
        //         'price_gros' => 360.0,
        //         'price_reseller' => 350.0,
        //         'latest_price' => 50.0,
        //         'remise' => 10,
        //         'tva' => 20,
        //         'min_stock' => 50,
        //         'unite' => 'KG',
        //         'bar_code' => '321564564564',
        //         'stockable' => 0,
        //         'created_by' => '1',
        //         'stock_methode' => 'CMUP',
        //         'archive' => '0',
        //         'brand_id' => 'a7028211-212b-4d2f-a75b-48825f4ccfb3',
        //         'picture' => '1703969716-Mouce.png',
        //         'warehouse_id' => 'fb7a7118-7b76-4cad-ba47-af7536686998',
        //         'active' => 1,
        //         'created_at' => '2023-12-30',
        //         'updated_at' => '2023-12-30',
        //         'deleted_at' => NULL,
        //     ),
        //     1 =>
        //     array (
        //         'id' => '0bd7fd0d-684e-4b0e-9d02-e12e507622e3',
        //         'product_code' => 'PR-2',
        //         'name_fr' => 'Cima 45',
        //         'name_ar' => 'سيما 45',
        //         'category_id' => 'e96e09ea-734b-4876-a995-e496b654c4c3',
        //         'scategory_id' => 'b339a48f-b85e-4948-a634-b055faf5ffb3',
        //         'buy_price' => 80.0,
        //         'price_unit' => 100.0,
        //         'price_gros' => 116.0,
        //         'price_reseller' => 115.0,
        //         'latest_price' => 50.0,
        //         'remise' => 5,
        //         'tva' => 10,
        //         'min_stock' => 20,
        //         'unite' => 'PIECE',
        //         'bar_code' => '3145ssssss',
        //         'stockable' => 0,
        //         'created_by' => '1',
        //         'stock_methode' => 'CMUP',
        //         'archive' => '0',
        //         'brand_id' => '7766a0a8-4aef-43c9-b625-5d6b239ec084',
        //         'picture' => '1703972344-Cima 45.png',
        //         'warehouse_id' => 'fb7a7118-7b76-4cad-ba47-af7536686998',
        //         'active' => 1,
        //         'created_at' => '2023-12-30',
        //         'updated_at' => '2023-12-30',
        //         'deleted_at' => NULL,
        //     ),
        // ));

    }
}
