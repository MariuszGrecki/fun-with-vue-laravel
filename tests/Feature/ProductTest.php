<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_belongs_to_organization(): void
    {
        $organization = Organization::factory()->create();

        $product = Product::factory()
            ->for($organization)
            ->create();

        $this->assertTrue($product->organization->is($organization));
        $this->assertTrue($organization->products->contains($product));
    }

    public function test_product_factory_creates_a_slug(): void
    {
        $product = Product::factory()->create();

        $this->assertNotEmpty($product->slug);

        $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'slug' => $product->slug,
        ]);
    }

    public function test_product_slug_must_be_unique(): void
    {
        Product::factory()->create([
            'slug' => 'voter',
        ]);

        $this->expectException(QueryException::class);

        Product::factory()->create([
            'slug' => 'voter',
        ]);
    }
}