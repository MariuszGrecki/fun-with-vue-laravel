<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\FeatureRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_guest_comment_belongs_to_a_feature_request(): void
    {
        $featureRequest = FeatureRequest::factory()->create();

        $comment = Comment::factory()
            ->guest('guest@example.com')
            ->create([
                'feature_request_id' => $featureRequest->id,
                'author_name' => 'Guest User',
                'body' => 'Please add this feature.',
            ]);

        $this->assertTrue($comment->featureRequest->is($featureRequest));
        $this->assertDatabaseHas('comments', [
            'id' => $comment->id,
            'feature_request_id' => $featureRequest->id,
            'author_name' => 'Guest User',
            'email' => 'guest@example.com',
            'body' => 'Please add this feature.',
        ]);
    }

    public function test_comments_are_deleted_when_their_feature_request_is_deleted(): void
    {
        $featureRequest = FeatureRequest::factory()->create();
        $comment = Comment::factory()->create([
            'feature_request_id' => $featureRequest->id,
        ]);

        $featureRequest->delete();

        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id,
        ]);
    }
}
