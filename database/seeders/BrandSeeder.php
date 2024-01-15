<?php

namespace Database\Seeders;

use DB;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert(array (
            0 =>
            array (
                'id' => '7766a0a8-4aef-43c9-b625-5d6b239ec084',
                'name' => 'Toshiba',
                'picture' => NULL,
                'active' => 1,
                'created_at' => '2024-01-02 16:40:16',
                'updated_at' => '2024-01-02 16:40:16',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 'a7028211-212b-4d2f-a75b-48825f4ccfb3',
                'name' => 'samasung',
                'picture' => '1703969639-samasung.png',
                'active' => 1,
                'created_at' => '2023-12-30 20:53:59',
                'updated_at' => '2023-12-30 20:53:59',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 'd4c65d30-64ed-493c-b940-fc22eb3ec9fa',
                'name' => 'Hpt',
                'picture' => '1703969655-Hpt.png',
                'active' => 1,
                'created_at' => '2023-12-30 20:54:15',
                'updated_at' => '2023-12-30 20:54:15',
                'deleted_at' => NULL,
            ),
        ));

    }
}
