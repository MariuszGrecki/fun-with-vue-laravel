<?php

namespace Database\Factories;

use App\Models\FeatureRequest;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'feature_request_id' => FeatureRequest::factory(),
            'user_id' => User::factory(),
            'email' => null,
        ];
    }

    public function guest(?string $email = null): static
    {
        return $this->state(fn (): array => [
            'user_id' => null,
            'email' => $email ?? fake()->unique()->safeEmail(),
        ]);    
    }
}
