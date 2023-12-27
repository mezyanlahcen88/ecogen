<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductFactory>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'id' =>  Str::uuid(),
            'product_code' =>  'PR-'.Str::random(6),
            'name_fr' =>  $this->faker->name,
            'name_ar' =>  $this->faker->name,
            'category_id' =>  $this->faker->randomElement(['48ce88da-cc8d-4643-9a4e-16bffb4fc813', '67912cd2-1888-4478-bc36-cc558ef7276d']),
            'scategory_id' =>  $this->faker->randomElement(['44c728dc-7f59-457d-ad90-10a633722b91', 'dc04578d-bcc1-4b9f-aac6-c884dad0ea3f']),
            'buy_price' =>  $this->faker->randomFloat(2, 0, 999999.99),
            'price_unit'=>  $this->faker->randomFloat(2, 0, 999999.99),
            'price_gros'=>  $this->faker->randomFloat(2, 0, 999999.99),
            'price_reseller' =>  $this->faker->randomFloat(2, 0, 999999.99),
            'latest_price' =>  $this->faker->randomFloat(2, 0, 999999.99),
            'remise' =>  $this->faker->numberBetween(1, 99),
            'tva' =>  $this->faker->numberBetween(1, 99),
            'min_stock' =>  $this->faker->numberBetween(1, 99),
            'unite' =>  $this->faker->randomElement(['KG', 'Piece', 'Ton']),
            'warehouse_id'=>  '99b9efa5-b139-4502-bc5c-83c7824c53be',
            'bar_code'=>  $this->faker->numberBetween(1111111, 9999999),
            'stockable' =>  $this->faker->randomElement([0,1]),
            'created_by' =>  '142a514b-faef-4b89-b5fc-34811f151cf4',
            'stock_methode' =>  $this->faker->randomElement(['CMUP','FIFO','LIFO']),
            'archive' =>  $this->faker->randomElement([0,1]),
            'active' =>  $this->faker->randomElement([0,1]),
            'brand_id' =>  $this->faker->randomElement(['26100eda-f80f-40d0-8d56-2aa55d537a2e','a8a2358c-a31e-4036-8916-14eb00a85352']),
            'picture' => 'ddddd.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
      ];
    }
}

