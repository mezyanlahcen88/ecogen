<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::create([
            'id' => 'fb7a7118-7b76-4cad-ba47-af7536686998',
            'name' => 'Depot Hay essalam',
            'address' => '<p>Depot Hty essalam</p>',
            'active' => 1,
            'created_at' => '2023-12-27 18:59:44',
            'updated_at' => '2023-12-27 18:59:44',
            'deleted_at' => null,
        ]);
    }
}
