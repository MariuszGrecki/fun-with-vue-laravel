<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'organization_id' => Organization::factory(),
            'name' => $name,
            'slug' => str($name)->slug(),
        ];
    }
}
