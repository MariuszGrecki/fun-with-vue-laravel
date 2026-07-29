<?php

namespace Database\Factories;

use App\Models\FeatureRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;
use App\Enums\FeatureRequestStatus;

/**
 * @extends Factory<FeatureRequest>
 */
class FeatureRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'author_id' => User::factory(),
            'title' => Str::random(10),
            'description' => Str::random(10),
            'status' => FeatureRequestStatus::Open,
        ];
    }
}
