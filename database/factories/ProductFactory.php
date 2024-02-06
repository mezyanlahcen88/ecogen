<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
        $categories = Category::where('parent_id',null)->pluck('id')->toArray();
        $scategories = Category::where('parent_id','!=',null)->pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $user = User::first()->uuid;

      return [
            'id' =>  Str::uuid(),
            'product_code' =>  'PR-'.$this->faker->numberBetween(1111111, 9999991),
            'name_fr' =>  $this->faker->name,
            'name_ar' =>  $this->faker->name,
            'category_id' =>  $this->faker->randomElement($categories),
            'scategory_id' =>  $this->faker->randomElement($scategories),
            'buy_price' =>  $this->faker->randomFloat(2, 11.11, 99.99),
            'price_unit'=>  $this->faker->randomFloat(2, 11.11, 99.99),
            'price_gros'=>  $this->faker->randomFloat(2, 11.11, 99.99),
            'price_reseller' =>  $this->faker->randomFloat(2, 11.11, 99.99),
            'latest_price' =>  $this->faker->randomFloat(2, 11.11, 99.99),
            'remise' =>  $this->faker->randomElement([0,5,10]),
            'tva' =>  $this->faker->randomElement([7,10,15,20]),
            'min_stock' =>  $this->faker->numberBetween(1, 99),
            'unite' =>  $this->faker->randomElement(['KG', 'Piece', 'Ton']),
            'warehouse_id'=>  'fb7a7118-7b76-4cad-ba47-af7536686998',
            'bar_code'=>  $this->faker->numberBetween(1111111, 9999999),
            'stockable' =>  $this->faker->randomElement([0,1]),
            'created_by' =>  $user,
            'stock_methode' =>  'CMUP',
            'archive' =>  $this->faker->randomElement([0,1]),
            'active' =>  $this->faker->randomElement([0,1]),
            'brand_id' =>  $this->faker->randomElement($brands),
            'picture' => 'ddddd.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
      ];
    }
}

