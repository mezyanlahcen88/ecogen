<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'id' => 'fb7a7118-7b76-4cad-ba47-af7536686998',
            'name' => 'samsung',
            'picture' => null,
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
        ],
        [
            'id' => '11b0e500-af74-441d-8d56-b50d49dd78b3',
            'name' => 'Toshiba',
            'picture' => null,
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
        ],
        [
            'id' => '6639b2b7-1d98-48b4-a768-a21deb5356d8',
            'name' => 'Hp',
            'picture' => null,
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
        ]
    );

    }
}
