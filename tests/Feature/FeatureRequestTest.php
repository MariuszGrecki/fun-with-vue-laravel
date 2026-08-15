<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Product;
use App\Models\FeatureRequest;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeatureRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_feature_request_can_be_created_for_a_product(): void
    {
        $organization = Organization::factory()->create();
        $product = Product::factory()->for($organization)->create();

        $response = $this->postJson(
            '/api/products/' . $product->id . '/feature-requests',
            [
                'title' => 'Nowy wpis',
                'description' => 'Nowy opis'
            ]
        );

        $response->assertCreated();
        $this->assertDatabaseHas('feature_requests', [
            'product_id' => $product->id,
            'title' => 'Nowy wpis',
            'description' => 'Nowy opis',
        ]);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'description',
                'status',
                'tags',
                'created_at'
            ],
        ]);
    }

    public function test_a_feature_request_requires_a_title(): void
    {
        $organization = Organization::factory()->create();
        $product = Product::factory()->for($organization)->create();

        $response = $this->postJson(
            '/api/products/' . $product->id . '/feature-requests',
            [
                'description' => 'Nowy opis'
            ]
        );

        $response->assertUnprocessable();
        $response->assertJsonValidationErrors(['title']);

        $this->assertDatabaseCount('feature_requests', 0);
    }

    public function test_a_product_returns_only_its_feature_requests(): void
    {
        $organization = Organization::factory()->create();
        $productFirst = Product::factory()->for($organization)->create();
        
        $featureRequestForFirstProduct = FeatureRequest::factory()
            ->for($productFirst)
            ->create();

        $featureRequestSecondForFirstProduct = FeatureRequest::factory()
            ->for($productFirst)
            ->create();

        $productSecond = Product::factory()->for($organization)->create();

        $featureRequestForSecondProduct = FeatureRequest::factory()
            ->for($productSecond)
            ->create();

        $response = $this->getJson(
            '/api/products/' . $productFirst->id . '/feature-requests',
        );

        $response->assertOk();
        $response->assertJsonCount(2, 'data');
        $response->assertJsonMissing([
            'title' => $featureRequestForSecondProduct->title,
        ]);
    }

    public function test_feature_request_response_includes_vote_count(): void
    {
        $product = Product::factory()->create();

        $featureRequest = FeatureRequest::factory()
            ->for($product)
            ->create();

        Vote::factory()
            ->count(3)
            ->for($featureRequest)
            ->create();

        $response = $this->getJson(
            '/api/products/' . $product->id . '/feature-requests',
        );

        $response
            ->assertOk()
            ->assertJsonPath('data.0.id', $featureRequest->id)
            ->assertJsonPath('data.0.votes_count', 3);
    }
}