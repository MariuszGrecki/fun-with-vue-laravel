<?php

namespace Tests\Feature;

use App\Models\FeatureRequest;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_vote_twice_for_same_feature_request(): void
    {
        $featureRequest = FeatureRequest::factory()->create();
        $user = User::factory()->create();

        Vote::factory()->create([
            'feature_request_id' => $featureRequest->id,
            'user_id' => $user->id,
        ]);

        $this->expectException(QueryException::class);

        Vote::factory()->create([
            'feature_request_id' => $featureRequest->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_guest_cannot_vote_twice_for_same_feature_request(): void
    {
        $featureRequest = FeatureRequest::factory()->create();
        $email = 'guest@example.com';

        Vote::factory()
            ->guest($email)
            ->create([
                'feature_request_id' => $featureRequest->id,
            ]);

        $this->expectException(QueryException::class);

        Vote::factory()
            ->guest($email)
            ->create([
                'feature_request_id' => $featureRequest->id,
            ]);
    }

    public function test_user_can_vote_for_different_feature_requests(): void
    {
        $user = User::factory()->create();
        $firstFeatureRequest = FeatureRequest::factory()->create();
        $secondFeatureRequest = FeatureRequest::factory()->create();

        Vote::factory()->create([
            'feature_request_id' => $firstFeatureRequest->id,
            'user_id' => $user->id,
        ]);

        Vote::factory()->create([
            'feature_request_id' => $secondFeatureRequest->id,
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseCount('votes', 2);
    }
}