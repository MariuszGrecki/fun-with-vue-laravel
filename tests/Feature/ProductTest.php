<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}