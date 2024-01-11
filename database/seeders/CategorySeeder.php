<?php

namespace Database\Seeders;

use DB;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array (
            0 =>
            array (
                'id' => 'b339a48f-b85e-4948-a634-b055faf5ffb3',
                'picture' => '1703969571-Laptops.png',
                'name' => 'Laptops',
                'parent_id' => 'e96e09ea-734b-4876-a995-e496b654c4c3',
                'menu' => 'sur place',
                'stockable' => 0,
                'active' => 1,
                'created_at' => '2023-12-30 20:52:51',
                'updated_at' => '2023-12-30 20:52:51',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 'cb003d55-2f32-46c3-bc1b-9e2306f9060a',
                'picture' => '1703969623-Machine a laver.png',
                'name' => 'Machine a laver',
                'parent_id' => 'd54e21bd-e7bf-45df-951a-2cd17c165cfc',
                'menu' => 'sur place',
                'stockable' => 0,
                'active' => 1,
                'created_at' => '2023-12-30 20:53:43',
                'updated_at' => '2023-12-30 20:53:43',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 'd54e21bd-e7bf-45df-951a-2cd17c165cfc',
                'picture' => '1703969586-Electroménager.png',
                'name' => 'Electroménager',
                'parent_id' => NULL,
                'menu' => 'sur place',
                'stockable' => 0,
                'active' => 1,
                'created_at' => '2023-12-30 20:53:06',
                'updated_at' => '2023-12-30 20:53:06',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 'e96e09ea-734b-4876-a995-e496b654c4c3',
                'picture' => '1703969475-Electronics.png',
                'name' => 'Electronics',
                'parent_id' => NULL,
                'menu' => NULL,
                'stockable' => 0,
                'active' => 1,
                'created_at' => '2023-12-30 20:51:15',
                'updated_at' => '2023-12-30 20:51:15',
                'deleted_at' => NULL,
            ),
        ));

    }
}
