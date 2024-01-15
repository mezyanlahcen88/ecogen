<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NumerotationFactory>
 */
class NumerotationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'name' => $this->faker->name,
                'email' => $this->faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
                'tiny_int' => $this->faker->numberBetween(-128, 127),
                'small_int' => $this->faker->numberBetween(-32768, 32767),
                'medium_int' => $this->faker->numberBetween(-8388608, 8388607),
                'int' => $this->faker->numberBetween(-2147483648, 2147483647),
                'big_int' => $this->faker->numberBetween(-9223372036854775808, 9223372036854775807),
                'unsigned_tiny_int' => $this->faker->numberBetween(0, 255),
                'unsigned_small_int' => $this->faker->numberBetween(0, 65535),
                'unsigned_medium_int' => $this->faker->numberBetween(0, 16777215),
                'unsigned_int' => $this->faker->numberBetween(0, 4294967295),
                'unsigned_big_int' => $this->faker->numberBetween(0, 18446744073709551615),
                'float' => $this->faker->randomFloat(2, 0, 999999.99),
                'double' => $this->faker->randomFloat(2, 0, 999999.99),
                'decimal' => $this->faker->randomFloat(2, 0, 999999.99),
                'bool' => $this->faker->boolean,
                'enum' => $this->faker->randomElement(['value1', 'value2', 'value3']),
                'text' => $this->faker->text,
                'medium_text' => $this->faker->text(500),
                'long_text' => $this->faker->text(1000),
                'json' => $this->faker->randomElement([json_encode(['key1' => 'value1', 'key2' => 'value2']), null]),
                'jsonb' => $this->faker->randomElement([json_encode(['key1' => 'value1', 'key2' => 'value2']), null]),
                'date' => $this->faker->date,
                'date_time' => $this->faker->dateTime,
                'date_time_tz' => $this->faker->dateTime,
                'time' => $this->faker->time,
                'time_tz' => $this->faker->time,
                'year' => $this->faker->year,
                'binary' => $this->faker->randomElement([pack('H*', md5('binary')), null]),
                'uuid' => $this->faker->uuid,
                'ip_address' => $this->faker->ipv4,
                'mac_address' => $this->faker->macAddress,
      ];
    }
}

