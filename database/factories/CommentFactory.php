<?php

namespace Database\Factories;

use App\Models\FeatureRequest;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
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
            'body' => fake()->sentence(),
        ];
    }

    public function guest(?string $email = null): static
    {
        return $this->state(fn (): array => [
            'user_id' => null,
            'email' => $email ?? fake()->unique()->safeEmail(),
            'body' => fake()->sentence(),
        ]);    
    }
}
